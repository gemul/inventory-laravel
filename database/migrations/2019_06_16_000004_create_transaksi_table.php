<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransaksiTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'transaksi';

    /**
     * Run the migrations.
     * @table transaksi
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('idtransaksi');
            $table->integer('iduser')->nullable()->default(null);
            $table->integer('idbarang')->nullable()->default(null);
            $table->dateTime('tanggal')->nullable()->default(null);
            $table->string('jenis', 8)->nullable()->default(null)->comment('keluar = barang keluar, masuk = barang masuk');
            $table->double('jumlah')->nullable()->default(null);
            $table->string('lokasi', 191)->nullable()->default(null);
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
