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
            $table->string('severity', 20)->after('crime_category_id');
            $table->text('description')->nullable()->after('severity');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('crimes', function (Blueprint $table) {
            $table->dropColumn(['severity', 'description']);
        });
    }
};