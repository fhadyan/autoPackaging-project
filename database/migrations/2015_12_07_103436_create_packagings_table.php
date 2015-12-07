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
                $table->string('no_do');
$table->integer('no_contract');
$table->integer('invoice');
$table->integer('invoice_date');

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
