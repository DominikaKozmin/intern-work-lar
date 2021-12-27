<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offers', function (Blueprint $table) {
            /*
            $table->id();
            $table->integer('company_id');
            $table->integer('category_id');
            $table->integer('location_id');
            $table->integer('type_id');
            $table->integer('offer_duration');
            $table->integer('job_duration')->nullable();
            $table->date('job_start')->nullable();
            $table->char('position');
            $table->string('city');
            $table->char('image')->nullable();
            $table->integer('salary')->nullable();
            $table->integer('vacancies')->nullable();
            $table->longtext('description');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            */

            $table->id();
            $table->string('slug');
            $table->string('title');
            $table->unsignedBigInteger('user_id');
            $table->string('salary');
            //Need contract types table
            $table->unsignedBigInteger('industry'); //Category
            //Need languages table
            $table->date('deadline');
            $table->longText('content');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            //$table->foreign('industry')->references('id')->on('industries');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('offers');
    }
}
