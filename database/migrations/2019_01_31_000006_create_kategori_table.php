<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKategoriTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'kategori';

    /**
     * Run the migrations.
     * @table kategori
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('idkategori');
            $table->string('kode', 16)->nullable();
            $table->string('nama')->nullable();
            $table->boolean('deleted')->nullable()->default('0');
            $table->dateTime('created')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->dateTime('updated')->nullable()->default(DB::raw('NULL ON UPDATE CURRENT_TIMESTAMP'));
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
