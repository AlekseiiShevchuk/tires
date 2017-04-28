<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create1493393005TireProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('tire_products')) {
            Schema::create('tire_products', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name');
                $table->integer('brand_id')->unsigned()->nullable();
                $table->foreign('brand_id', '33101_59035e6cf2b54')->references('id')->on('tire_brands')->onDelete('cascade');
                $table->integer('size_id')->unsigned()->nullable();
                $table->foreign('size_id', '33101_59035e6d04956')->references('id')->on('tire_sizes')->onDelete('cascade');
                $table->text('description')->nullable();
                $table->double('price', 15, 2)->nullable();
                $table->double('special_price', 15, 2)->nullable();
                $table->string('image_1')->nullable();
                $table->string('image_2')->nullable();
                $table->string('image_3')->nullable();
                $table->string('image_4')->nullable();
                $table->string('image_5')->nullable();
                $table->string('image_6')->nullable();
                
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
        Schema::dropIfExists('tire_products');
    }
}
