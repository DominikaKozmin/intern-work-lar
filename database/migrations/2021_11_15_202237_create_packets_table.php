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
            $table->string('business_size');
            $table->string('packet_name');
            $table->decimal('price');
            $table->unsignedTinyInteger('highlighted_offers');
            $table->unsignedTinyInteger('renewals');
            $table->unsignedMediumInteger('days');
            $table->unsignedTinyInteger('categories');
            $table->unsignedTinyInteger('offers');
            $table->foreignId('color_scheme_id');
            $table->foreign('color_scheme_id')
                ->references('id')
                ->on('color_schemes')
                ->onDelete('cascade');
        });
        DB::table('packets')->insert([
            [
                'business_size' => 'Malutka',
                'packet_name' => 'Mini',
                'price' => '0',
                'highlighted_offers' => '0',
                'renewals' => '0',
                'days' => '15',
                'categories' => '1',
                'offers' => '1',
                'color_scheme_id' => '2'
            ],
            [
                'business_size' => 'Mała',
                'packet_name' => 'Standart',
                'price' => '199.00',
                'highlighted_offers' => '2',
                'renewals' => '2',
                'days' => '7',
                'categories' => '1',
                'offers' => '3',
                'color_scheme_id' => '1'
            ],
            [
                'business_size' => 'Mała',
                'packet_name' => 'Standart',
                'price' => '329.00',
                'highlighted_offers' => '4',
                'renewals' => '4',
                'days' => '30',
                'categories' => '2',
                'offers' => '5',
                'color_scheme_id' => '3'
            ],
            [
                'business_size' => 'Średnia',
                'packet_name' => 'Standart',
                'price' => '749',
                'highlighted_offers' => '6',
                'renewals' => '6',
                'days' => '120',
                'categories' => '3',
                'offers' => '8',
                'color_scheme_id' => '4'
            ],
            [
                'business_size' => 'Duża',
                'packet_name' => 'Premium',
                'price' => '1999',
                'highlighted_offers' => '8',
                'renewals' => '8',
                'days' => '90',
                'categories' => '5',
                'offers' => '10',
                'color_scheme_id' => '2'
            ],
            [
                'business_size' => 'Duża',
                'packet_name' => 'Ultra',
                'price' => '2399',
                'highlighted_offers' => '10',
                'renewals' => '10',
                'days' => '120',
                'categories' => '8',
                'offers' => '15',
                'color_scheme_id' => '5'
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
        Schema::dropIfExists('packets');
    }
}
