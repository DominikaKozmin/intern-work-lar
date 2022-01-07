<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Industries extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('industries', function (Blueprint $table) {
            $table->id();
            $table->string('name');
        });
        DB::table('industries')->insert([
            [
                'name' => 'IT - Rozwój oprogramowania'
            ],
            [
                'name' => 'Transport / Spedycja'
            ],
            [
                'name' => 'Praca fizyczna'
            ],
            [
                'name' => 'Produkcja'
            ],
            [
                'name' => 'IT - Administracja'
            ],
            [
                'name' => 'Marketing'
            ],
            [
                'name' => 'Opieka zdrowotna'
            ],
            [
                'name' => 'Gastronomia / Catering'
            ],
            [
                'name' => 'Badania i rozwój'
            ],
            [
                'name' => 'Budownictwo'
            ],
            [
                'name' => 'Bankowość'
            ],
            [
                'name' => 'Obsługa klienta'
            ],
            [
                'name' => 'Nieruchomości'
            ],
            [
                'name' => 'Sprzedaż'
            ],
            [
                'name' => 'Reklama / Grafika / Fotografia'
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
        Schema::dropIfExists('industries');
    }
}
