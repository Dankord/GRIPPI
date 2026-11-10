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
        Schema::create('crime_temporal_aggregates', function (Blueprint $table) {
            $table->id();
            $table->foreignId('station_id')->constrained('stations')->restrictOnDelete();
            $table->foreignId('grid_cell_id')->nullable()->constrained('grid_cells')->restrictOnDelete();
            $table->foreignId('crime_category_id')->nullable()->constrained('crime_categories')->restrictOnDelete();
            $table->timestampTz('period_start');
            $table->timestampTz('period_end');
            $table->unsignedSmallInteger('day');
            $table->time('time_slot_start');
            $table->time('time_slot_end');
            $table->unsignedInteger('incident_count')->default(0);
            $table->timestampsTz();

            $table->index(
                ['station_id', 'day', 'time_slot_start'],
                'crime_temporal_aggregates_lookup_index'
            );
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('crime_temporal_aggregates');
    }
};
