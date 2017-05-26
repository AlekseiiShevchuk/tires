<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPreOrderTireTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('pre_orders_tires')) {
            Schema::create('pre_orders_tires', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('pre_order_id')->unsigned()->nullable();
                $table->foreign('pre_order_id')->nullable()->references('id')->on('pre_orders')->onDelete('set null');
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
        Schema::dropIfExists('pre_orders_tires');
    }
}
