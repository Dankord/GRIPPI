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
        Schema::table('users', function (Blueprint $table) {
            $table->string('role')->default('officer');
            $table->string('personnel_number')->nullable()->unique();
            $table->string('station_id')->nullable()->constrained('stations')->restrictOnDelete();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropSoftDeletes();
            $table->dropForeign(['station_id']);
            $table->dropUnique(['personnel_number']);
            $table->dropcolumn([
                'role',
                'personnel_number',
                'station_id'
            ]);
        });
    }
};
