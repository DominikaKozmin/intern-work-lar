<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FillTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('types')->insert([
            [
                'name' => "Część etatu"
            ],
            [
                'name' => "Pełny etat"
            ],
            [
                'name' => "Kontrakt"
            ],
            [
                'name' => "Freelancer"
            ],
            [
                'name' => "Praktyka"
            ],
            [
                'name' => "Wolontariat"
            ],
            [
                'name' => "Praca czasowa"
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
        //
    }
}
