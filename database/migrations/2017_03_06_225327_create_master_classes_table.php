<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMasterClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('master_classes', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->dateTime('datetime');
            $table->string('name');
            $table->integer('humans')->unsigned();
            $table->integer('price')->unsigned();
            $table->text('description');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('view_id')->unsigned();
            $table->foreign('view_id')->references('id')->on('views')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('master_classes');
    }
}
