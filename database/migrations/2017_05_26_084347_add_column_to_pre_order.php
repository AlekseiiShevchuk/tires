<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnToPreOrder extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(Schema::hasTable('pre_orders')) {
            Schema::table('pre_orders', function (Blueprint $table) {
                $table->integer('is_confirmed')->unsigned();
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
        if(Schema::hasTable('pre_orders')) {
            Schema::table('pre_orders', function (Blueprint $table) {
                $table->dropColumn(['is_confirmed']);
            });
        }
    }
}
