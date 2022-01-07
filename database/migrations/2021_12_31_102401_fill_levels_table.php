<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FillLevelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('levels')->insert([
            [
                'name' => 'Pracownik fizyczny'
            ],
            [
                'name' => 'Specjalista'
            ],
            [
                'name' => 'Kierownik'
            ],
            [
                'name' => 'Asystent'
            ],
            [
                'name' => 'Praktykant/Stażysta'
            ],
            [
                'name' => 'Dyrektor/Prezes'
            ]
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
