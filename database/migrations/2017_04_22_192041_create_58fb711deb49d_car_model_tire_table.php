<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create58fb711deb49dCarModelTireTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('car_model_tire')) {
            Schema::create('car_model_tire', function (Blueprint $table) {
                $table->integer('car_model_id')->unsigned()->nullable();
                $table->foreign('car_model_id', 'fk_p_31594_31617_tire_car_58fb711deb5e5')->references('id')->on('car_models')->onDelete('cascade');
                $table->integer('tire_id')->unsigned()->nullable();
                $table->foreign('tire_id', 'fk_p_31617_31594_carmodel_58fb711deb6ce')->references('id')->on('tires')->onDelete('cascade');
                
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
        Schema::dropIfExists('car_model_tire');
    }
}
