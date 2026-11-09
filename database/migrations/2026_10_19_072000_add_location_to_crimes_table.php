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
        // Adding the postGISt column
       DB::statement("
            ALTER TABLE crimes
            ADD COLUMN location geometry(Point, 4326)
       ");

        // special index for geogrpahics queries
       DB::statement("
            CREATE INDEX crimes_location_gist
            ON crimes
            USING GIST (location)
       ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("
            DROP INDEX IF EXISTS crimes_location_gist
        ");

        DB::statement("
            ALTER TABLE crimes
            DROP COLUMN IF EXISTS location
        ");
    }
};
