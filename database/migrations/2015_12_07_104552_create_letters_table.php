<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLettersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
            Schema::create('letters', function(Blueprint $table) {
                $table->increments('id');
                $table->date('date');
                $table->text('note');
                $table->integer('order_id')->unsigned();
                $table->integer('supir_id')->unsigned();
                $table->integer('packaging_id')->unsigned();
                $table->timestamps();

                $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
                $table->foreign('supir_id')->references('id')->on('supirs')->onDelete('cascade');
                $table->foreign('packaging_id')->references('id')->on('packagings')->onDelete('cascade');
            });
            
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('letters');
    }
}
