<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAbilitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('abilities', function (Blueprint $table) {
            $table->id();
            $table->string('name');
        });
        DB::table('abilities')->insert([
            [
                'name' => 'PHP'
            ],
            [
                'name' => 'Photoshop'
            ],
            [
                'name' => 'Web Developer'
            ],
            [
                'name' => 'OOP PHP'
            ],
            [
                'name' => 'oop'
            ],
            [
                'name' => 'Social Media'
            ],
            [
                'name' => 'objective-c'
            ],
            [
                'name' => 'NodeJS'
            ],
            [
                'name' => 'Word'
            ],
            [
                'name' => 'Wordpress'
            ],
            [
                'name' => 'Negocjacje'
            ],
            [
                'name' => 'Uprawnienie na wózek widłowy'
            ],
            [
                'name' => 'public relations'
            ],
            [
                'name' => 'Software Development'
            ],
            [
                'name' => 'rozmowy rekrutacyjne'
            ],
            [
                'name' => 'SQL'
            ],
            [
                'name' => 'swobodnie nawiązuje kontakty biznesowe'
            ],
            [
                'name' => 'Mysql'
            ],
            [
                'name' => 'Python'
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
        Schema::dropIfExists('abilities');
    }
}
