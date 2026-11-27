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
        DB::statement("
            ALTER TABLE grid_cells
            ALTER COLUMN area_sq_km TYPE NUMERIC(14, 8)
        ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("
            ALTER TABLE grid_cells
            ALTER COLUMN area_sq_km TYPE NUMERIC(12, 4)
        ");
    }
};
