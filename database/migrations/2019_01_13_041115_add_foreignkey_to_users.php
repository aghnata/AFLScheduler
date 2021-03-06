<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignkeyToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function(Blueprint $table)
        {
            $table->integer('role_id')->unsigned()->nullable();
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
            $table->integer('afler_id')->unsigned()->nullable();
            $table->foreign('afler_id')->references('id')->on('aflers')->onDelete('cascade');
            $table->integer('aflee_id')->unsigned()->nullable();
            $table->foreign('aflee_id')->references('id')->on('aflees')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function(Blueprint $table)
        {
            $table->dropForeign(['role_id']);
            $table->dropColumn('role_id');
            $table->dropForeign(['afler_id']);
            $table->dropColumn('afler_id');
            $table->dropForeign(['aflee_id']);
            $table->dropColumn('aflee_id');
        });
    }
}
