<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePeminjamanTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'peminjaman';

    /**
     * Run the migrations.
     * @table peminjaman
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('idpeminjaman');
            $table->integer('iduser')->nullable()->default(null);
            $table->integer('idbarang')->nullable()->default(null);
            $table->string('nama', 191)->nullable()->default(null);
            $table->dateTime('tgl_pinjam')->nullable()->default(null);
            $table->string('bukti', 45)->nullable()->default(null);
            $table->string('nomorbukti', 45)->nullable()->default(null);
            $table->string('label', 45)->nullable()->default(null);
            $table->text('catatan')->nullable()->default(null);
            $table->dateTime('kembali')->nullable()->default(null);
            $table->text('kembali_catatan')->nullable()->default(null);
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
