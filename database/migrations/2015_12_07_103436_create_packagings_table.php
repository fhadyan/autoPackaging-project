<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePackagingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
            Schema::create('packagings', function(Blueprint $table) {
                $table->increments('id');
                $table->string('no_packaging');
                $table->string('no_do');
                $table->string('no_contract');
                $table->string('invoice');
                $table->date('invoice_date');

                $table->timestamps();
            });
            
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('packagings');
    }
}
