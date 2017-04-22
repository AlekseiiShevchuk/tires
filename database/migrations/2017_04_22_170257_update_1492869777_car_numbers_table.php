<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update1492869777CarNumbersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('car_numbers', function (Blueprint $table) {
            $table->integer('car_model_id')->unsigned()->nullable();
                $table->foreign('car_model_id', '31595_58fb62905bc59')->references('id')->on('car_models')->onDelete('cascade');
                
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('car_numbers', function (Blueprint $table) {
            $table->dropForeign('31595_58fb62905bc59');
            $table->dropIndex('31595_58fb62905bc59');
            $table->dropColumn('car_model_id');
            
        });

    }
}
