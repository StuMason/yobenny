<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->uuid('uuid')->primary();
            $table->uuid('owner_uuid');
            $table->string('title');
            $table->uuid('approved_by')->nullable();
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->datetime('start_time');
            $table->datetime('end_time');
            $table->string('image_url');
            $table->longText('description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
}
