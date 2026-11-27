<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
                // Remove station relationship from geographic grid cells.
        Schema::table('grid_cells', function (Blueprint $table) {
            $table->dropConstrainedForeignId('station_id');
        });

        // Add reporting station to spatial crime aggregates.
        Schema::table('crime_cell_aggregates', function (Blueprint $table) {
            $table->foreignId('station_id')
                ->constrained('stations')
                ->restrictOnDelete();

            $table->index(
                [
                    'station_id',
                    'grid_cell_id',
                    'period_start',
                    'period_end'
                ],
                'crime_cell_aggregates_station_lookup_index'
            );

            $table->unique(
                [
                    'station_id',
                    'grid_cell_id',
                    'crime_category_id',
                    'period_start',
                    'period_end'
                ],
                'crime_cell_aggregates_unique'
            );
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('crime_cell_aggregates', function (Blueprint $table) {
            $table->dropUnique('crime_cell_aggregates_unique');

            $table->dropIndex(
                'crime_cell_aggregates_station_lookup_index'
            );

            $table->dropConstrainedForeignId('station_id');
        });

        Schema::table('grid_cells', function (Blueprint $table) {
            $table->foreignId('station_id')
                ->nullable()
                ->constrained('stations')
                ->restrictOnDelete();
        });
    }
};
