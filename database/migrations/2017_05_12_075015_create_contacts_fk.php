<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactsFk extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(Schema::hasTable('contacts')) {
            Schema::table('contacts', function (Blueprint $table) {
                $table->integer('user_id')->unsigned()->nullable();
                $table->integer('subject_id')->unsigned()->nullable();
                $table->foreign('user_id')->nullable()->references('id')->on('users')->onDelete('set null');
                $table->foreign('subject_id')->nullable()->references('id')->on('contacts_subjects')->onDelete('set null');
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
        //
    }
}
