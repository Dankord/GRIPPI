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
        Schema::create('crime_cell_aggregates', function (Blueprint $table) {
            $table->id();
            $table->foreignId('grid_cell_id')->constrained('grid_cells')->restrictOnDelete();
            $table->foreignId('crime_category_id')->constrained('crime_categories')->restrictOnDelete();
            $table->timestampTz('period_start');
            $table->timestampTz('period_end');
            $table->unsignedInteger('incident_count')->default(0);
            $table->unsignedInteger('high_severity_count')->default(0);

            $table->timestampsTz();

            $table->index(
                ['grid_cell_id', 'period_start', 'period_end'],
                'crime_cell_aggregates_look_up_index'
            );
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('crime_cell_aggregates');
    }
};
