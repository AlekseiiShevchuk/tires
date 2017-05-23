<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddOrdersTiresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('orders_tires')) {
            Schema::create('orders_tires', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('order_id')->unsigned()->nullable();
                $table->foreign('order_id')->nullable()->references('id')->on('orders')->onDelete('set null');
                $table->integer('tire_id')->unsigned()->nullable();
                $table->foreign('tire_id')->nullable()->references('id')->on('tire_products')->onDelete('set null');
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
        Schema::dropIfExists('orders_tires');
    }
}
