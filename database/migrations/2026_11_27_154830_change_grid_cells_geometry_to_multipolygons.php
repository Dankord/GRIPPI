<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('multipolygons', function (Blueprint $table) {
            DB::statement("
                ALTER TABLE grid_cells
                ALTER COLUMN geometry
                TYPE geometry(MultiPolygon, 4326)
                USING ST_Multi(geometry)
            ");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('multipolygons', function (Blueprint $table) {
            DB::statement("
                ALTER TABLE grid_cells
                ALTER COLUMN geometry
                TYPE geometry(Polygon, 4326)
                USING ST_GeometryN(geometry, 1)
            ");
        });
    }
};
