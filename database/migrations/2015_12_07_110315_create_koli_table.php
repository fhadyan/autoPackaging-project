<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKoliTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kolis', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('packaging_id')->unsigned();
            $table->integer('box_id')->unsigned();
            $table->timestamps();

            $table->foreign('packaging_id')->references('id')->on('packagings')->onDelete('cascade');
            $table->foreign('box_id')->references('id')->on('boxes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('kolis');
    }
}
