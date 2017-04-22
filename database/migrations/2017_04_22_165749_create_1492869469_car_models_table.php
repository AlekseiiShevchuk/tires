<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create1492869469CarModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('car_models')) {
            Schema::create('car_models', function (Blueprint $table) {
                $table->increments('id');
                $table->string('description');
                $table->string('motor');
                $table->integer('car_brand_id')->unsigned()->nullable();
                $table->foreign('car_brand_id', '31594_58fb615c87070')->references('id')->on('car_brands')->onDelete('cascade');
                
                $table->timestamps();
                $table->softDeletes();

                $table->index(['deleted_at']);
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
        Schema::dropIfExists('car_models');
    }
}
