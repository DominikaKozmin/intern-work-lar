<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreatePartnersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partners', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('path_to_wheel_img');
            $table->string('url');
            $table->timestamps();
        });
        DB::table('partners')->insert([
            [
                'name' => 'Azerjobs',
                'path_to_wheel_img' => 'azerjobs.png',
                'url' => 'http://www.azerjobs.com'
            ],
            [
                'name' => 'Bankers',
                'path_to_wheel_img' => 'bankers.png',
                'url' => 'http://www.bankers.ge'
            ],
            [
                'name' => 'EuRabota',
                'path_to_wheel_img' => 'eurabota.png',
                'url' => ''
            ],
            [
                'name' => 'gruzGo!',
                'path_to_wheel_img' => 'gruzgo.png',
                'url' => 'http://www.gruzgo.com'
            ],
            [
                'name' => 'HeadHunter',
                'path_to_wheel_img' => 'hh.png',
                'url' => 'http://www.hh.ua'
            ],
            [
                'name' => 'HR',
                'path_to_wheel_img' => 'hr.png',
                'url' => 'http://www.hr.ge'
            ],
            [
                'name' => 'IT-STARS',
                'path_to_wheel_img' => 'it-stars.gif',
                'url' => 'http://www.it-stars.ua'
            ],
            [
                'name' => 'Jobs.ua',
                'path_to_wheel_img' => 'jobs.png',
                'url' => 'http://www.jobs.ua'
            ],
            [
                'name' => 'Jobs.ge',
                'path_to_wheel_img' => 'jobs-ge.png',
                'url' => 'http://www.jobs.ge'
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
        Schema::dropIfExists('partners');
    }
}
