<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateColorSchemesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('color_schemes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('primary_color');
            $table->string('secondary_color');
        });
        DB::table('color_schemes')->insert([
            [
                'name' =>  'Yellow',
                'primary_color' => 'FFAE35',
                'secondary_color' => 'DC8812'
            ],
            [
                'name' =>  'Green',
                'primary_color' => '93C230',
                'secondary_color' => '709f0d'
            ],
            [
                'name' =>  'Red',
                'primary_color' => '933A16',
                'secondary_color' => '70171E'
            ],
            [
                'name' =>  'Blue',
                'primary_color' => '3399ff',
                'secondary_color' => '1076dc'
            ],
            [
                'name' =>  'Dark Green',
                'primary_color' => '2f532d',
                'secondary_color' => '0c300a'
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
        Schema::dropIfExists('color_schemes');
    }
}
