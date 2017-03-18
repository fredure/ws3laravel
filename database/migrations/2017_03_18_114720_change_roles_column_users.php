<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeRolesColumnUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            if (Schema::hasColumn('users', 'role')) {
                $table->renameColumn('role', 'role_id');
            }
            if (Schema::hasTable('roles')) {
                if (Schema::hasColumn('users', 'role_id')) {
                    $table->integer('role_id')->unsigned()->change();
                    $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade')->change();
                }
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
}
