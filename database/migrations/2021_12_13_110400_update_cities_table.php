<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateCitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cities', function (Blueprint $table){
            $table->dropForeign('cities_city_id_foreign');
            $table->dropColumn('city_id');
        });
        DB::table('cities')->insert([
            [
                'name' => "Poznań",
                'province_id' => 15
            ],
            [
                'name' => "Warszawa",
                'province_id' => 7
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
