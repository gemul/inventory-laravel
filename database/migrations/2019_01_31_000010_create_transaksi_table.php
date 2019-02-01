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
            $table->integer('iduser')->nullable();
            $table->integer('idbarang')->nullable();
            $table->dateTime('tanggal')->nullable();
            $table->string('jenis', 8)->nullable()->comment('keluar = barang keluar, masuk = barang masuk');
            $table->float('jumlah')->nullable();
            $table->string('lokasi')->nullable();
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
