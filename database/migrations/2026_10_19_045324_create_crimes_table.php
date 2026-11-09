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
        Schema::create('crimes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('crime_category_id')->constrained('crime_categories')->restrictOnDelete();
            $table->foreignId('station_id')->constrained('stations')->restrictOnDelete();
            $table->foreignId('reported_by_id')->nullable()->constrained('users')->restrictOnDelete();
            // when the crime happened
            $table->timestampTz('occurred_at')->nullable();
            // when the crime was reported
            $table->timestampTz('reported_at')->nullable();
            // human readable crime location
            $table->string('address')->nullable();

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('crimes');
    }
};
