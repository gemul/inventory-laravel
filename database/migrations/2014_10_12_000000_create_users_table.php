<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user', function (Blueprint $table) {
            $table->increments('iduser');
            $table->string('nama');
            $table->string('username')->unique();
            $table->string('password');
            $table->text('hak');
            $table->tinyInteger('aktif');
            $table->dateTime('deleted');
            $table->dateTime('created');
            $table->dateTime('updated');
            $table->tinyInteger('updated');
            $table->rememberToken();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
