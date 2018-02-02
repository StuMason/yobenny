<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddStartAndEndTimeToThing extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('things', function($table) {
            $table->datetime('start_time');
            $table->datetime('end_time');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('things', function($table) {
            $table->dropColumn('start_time');
            $table->dropColumn('end_time');
        });
    }
}
