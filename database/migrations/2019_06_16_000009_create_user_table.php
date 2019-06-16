<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'user';

    /**
     * Run the migrations.
     * @table user
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('iduser');
            $table->string('nama', 191)->nullable()->default(null);
            $table->string('username', 45)->nullable()->default(null);
            $table->string('password', 64)->nullable()->default(null);
            $table->rememberToken();
            $table->text('hak')->nullable()->default(null)->comment('json hak');
            $table->tinyInteger('aktif')->nullable()->default('1');
            $table->tinyInteger('deleted')->nullable()->default('0');
            $table->dateTime('created')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->dateTime('updated')->nullable()->default(null);
            $table->tinyInteger('is_admin')->nullable()->default('0');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
     public function down()
     {
       Schema::dropIfExists($this->tableName);
     }
}
