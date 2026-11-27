<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use RuntimeException;

class MakatiGridCellSeeder extends Seeder
{
    private const GEOJSON_PATH = 'data/makati.geojson';

    private const GRID_SIZE_METERS = 500;

    public function run(): void
    {
        // Read the GeoJSON of makati.
        $path = database_path(self::GEOJSON_PATH);

        if (! file_exists($path)) {
            throw new RuntimeException(
                "GeoJSON file not found: {$path}"
            );
        }

        $geoJson = json_decode(
            file_get_contents($path),
            true,
            512,
            JSON_THROW_ON_ERROR
        );

        if (
            ($geoJson['type'] ?? null) !== 'Feature' ||
            ! isset($geoJson['geometry'])
        ) {
            throw new RuntimeException(
                'Expected a GeoJSON Feature with a geometry.'
            );
        }

        $geometryJson = json_encode(
            $geoJson['geometry'],
            JSON_THROW_ON_ERROR
        );

        // Generate and insert the grid using PostGIS.
        DB::transaction(function () use ($geometryJson) {

            DB::statement("
                WITH boundary AS (
                    SELECT ST_Transform(
                        ST_SetSRID(
                            ST_GeomFromGeoJSON(?),
                            4326
                        ),
                        32651
                    ) AS geom
                ),

                grid AS (
                    SELECT
                        cell.i,
                        cell.j,
                        cell.geom
                    FROM boundary
                    CROSS JOIN LATERAL
                        ST_SquareGrid(
                            " . self::GRID_SIZE_METERS . ",
                            boundary.geom
                        ) AS cell
                ),

                clipped AS (
                    SELECT
                        grid.i,
                        grid.j,
                        ST_CollectionExtract(
                            ST_Intersection(
                                grid.geom,
                                boundary.geom
                            ),
                            3
                        ) AS geom
                    FROM grid
                    CROSS JOIN boundary
                    WHERE ST_Intersects(
                        grid.geom,
                        boundary.geom
                    )
                ),

                normalized AS (
                    SELECT
                        i,
                        j,
                        ST_Multi(
                            ST_Transform(geom, 4326)
                        ) AS geometry,
                        ST_Area(geom) / 1000000.0 AS area_sq_km
                    FROM clipped
                    WHERE
                        NOT ST_IsEmpty(geom)
                        AND ST_IsValid(geom)
                        AND ST_Area(geom) > 0
                )

                INSERT INTO grid_cells (
                    cell_code,
                    area_sq_km,
                    geometry,
                    created_at,
                    updated_at
                )
                SELECT
                    'MAK-' || i || '-' || j,
                    area_sq_km,
                    geometry,
                    CURRENT_TIMESTAMP,
                    CURRENT_TIMESTAMP
                FROM normalized

                ON CONFLICT (cell_code)
                DO UPDATE SET
                    area_sq_km = EXCLUDED.area_sq_km,
                    geometry = EXCLUDED.geometry,
                    updated_at = CURRENT_TIMESTAMP
            ", [$geometryJson]);
        });

        $totalCells = DB::table('grid_cells')->count();
        
        // show how much cells are generated for makati (expected 134)
        $this->command->info(
            "Makati grid generation completed. Total cells: {$totalCells}"
        );
    }
}
