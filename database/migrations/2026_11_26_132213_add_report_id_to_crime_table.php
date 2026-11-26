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
        Schema::table('crimes', function (Blueprint $table) {
            $table->string('report_id')->nullable()->unique();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('crimes', function (Blueprint $table) {
            $table->dropUnique(['report_id']);
            $table->dropColumn('report_id');
        });
    }
};
