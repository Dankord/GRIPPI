<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('grid_cells', function (Blueprint $table) {
            $table->id();
            $table->foreignId('station_id')->constrained('stations')->restrictOnDelete();
            $table->string('cell_code', 50);
            $table->decimal('area_sq_km', 12, 4);

            $table->timestamps();

            $table->unique(['station_id', 'cell_code']);
        });

        // add the geometry
        DB::statement("
            ALTER TABLE grid_cells
            ADD COLUMN geometry geometry(Polygon, 4326) NOT NULL
        ");
        // ensure positive cell area
        DB::statement("
            ALTER TABLE grid_cells
            ADD CONSTRAINT grid_cells_area_positive
            CHECK (area_sq_km > 0)
        ");

        // addition: check if the polygon is valid/existing
        DB::statement("
            ALTER TABLE grid_cells
            ADD CONSTRAINT grid_cells_geometry_valid
            CHECK (ST_isValid(geometry))
        ");

        // Add spatial index
        DB::statement("
            CREATE INDEX grid_cells_geometry_gist
            ON grid_cells
            USING GIST(geometry)
        ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('grid_cells');
    }
};
