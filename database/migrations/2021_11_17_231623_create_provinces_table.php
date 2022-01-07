<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProvincesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('provinces', function (Blueprint $table) {
            $table->id();
            $table->foreignId('country_id');
            $table->string('name');
            $table->foreign('country_id')
                ->references('id')
                ->on('countries')
                ->onDelete('cascade');
        });
        DB::table('provinces')->insert([
            [
                'country_id' => 1,
                'name' => 'Dolnośląskie'
            ],
            [
                'country_id' => 1,
                'name' => 'Kujawsko-pomorskie'
            ],
            [
                'country_id' => 1,
                'name' => 'Lubelskie'
            ],
            [
                'country_id' => 1,
                'name' => 'Lubuskie'
            ],
            [
                'country_id' => 1,
                'name' => 'Łódzkie'
            ],
            [
                'country_id' => 1,
                'name' => 'Małopolskie'
            ],
            [
                'country_id' => 1,
                'name' => 'Mazowieckie'
            ],
            [
                'country_id' => 1,
                'name' => 'Opolskie'
            ],
            [
                'country_id' => 1,
                'name' => 'Podkarpackie'
            ],
            [
                'country_id' => 1,
                'name' => 'Podlaskie'
            ],
            [
                'country_id' => 1,
                'name' => 'Pomorskie'
            ],
            [
                'country_id' => 1,
                'name' => 'Śląskie'
            ],
            [
                'country_id' => 1,
                'name' => 'Świętokrzyskie'
            ],
            [
                'country_id' => 1,
                'name' => 'Warmińsko-mazurskie'
            ],
            [
                'country_id' => 1,
                'name' => 'Wielkopolskie'
            ],
            [
                'country_id' => 1,
                'name' => 'Zachodniopomorskie'
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('provinces');
    }
}
