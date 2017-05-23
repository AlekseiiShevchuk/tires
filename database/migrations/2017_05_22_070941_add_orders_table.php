<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('orders')) {
            Schema::create('orders', function (Blueprint $table) {
                $table->increments('id');
                $table->string('identifier');
                $table->integer('price')->unsigned();
                $table->integer('count')->unsigned();
                $table->integer('user_id')->unsigned()->nullable();
                $table->foreign('user_id')->nullable()->references('id')->on('users')->onDelete('set null');
                $table->timestamps();
                
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
