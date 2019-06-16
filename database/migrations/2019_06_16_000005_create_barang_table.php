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
            $table->string('namabarang', 191)->nullable()->default(null);
            $table->string('kode', 16)->nullable()->default(null);
            $table->text('spesifikasi')->nullable()->default(null);
            $table->text('catatan')->nullable()->default(null);
            $table->dateTime('deleted')->nullable()->default(null);
            $table->dateTime('created')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->dateTime('updated')->nullable()->default(null);
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
