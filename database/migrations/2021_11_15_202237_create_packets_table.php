<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePacketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('packets', function (Blueprint $table) {
            $table->id();
            $table->string('buinsess_size');
            $table->string('packet_name');
            $table->decimal('price');
            $table->unsignedTinyInteger('highlighted_offers');
            $table->unsignedTinyInteger('renewals');
            $table->unsignedMediumInteger('days');
            $table->unsignedTinyInteger('categories');
            $table->unsignedTinyInteger('offers');
            $table->foreignId('color_scheme_id');
            $table->foreign('color_scheme_id')->references('id')->on('color_schemes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('packets');
    }
}
