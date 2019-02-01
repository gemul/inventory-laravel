<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBarangTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'barang';

    /**
     * Run the migrations.
     * @table barang
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('idbarang');
            $table->integer('idkategori');
            $table->string('namabarang')->nullable();
            $table->string('kode', 16)->nullable();
            $table->text('spesifikasi')->nullable();
            $table->text('catatan')->nullable();
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
