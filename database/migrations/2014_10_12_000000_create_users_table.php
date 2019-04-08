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
            $table->string('username',45)->unique();
            $table->string('password',128);
            $table->text('hak');
            $table->boolean('aktif');
            $table->dateTime('deleted')->nullable()->default(null);
            $table->dateTime('created')->default(DB::raw('CURRENT_TIMESTAMP'));;
            $table->dateTime('updated')->nullable()->default(DB::raw('NULL ON UPDATE CURRENT_TIMESTAMP'));
            $table->boolean('is_admin');
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
        Schema::dropIfExists('user');
    }
}
