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
            $table->id();
            $table->string('company_id');
            $table->string('category_id');
            $table->string('location_id');
            $table->string('type_id');
            $table->int('offer_duration');
            $table->int('job_duration')->nullable();
            $table->date('job_start')->nullable();
            $table->varchar('position');
            $table->string('city');
            $table->varchar('image')->nullable();
            $table->int('salary')->nullable();
            $table->int('vacancies')->nullable();
            $table->longtext('description');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
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
