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
            $table->integer('iduser')->nullable();
            $table->integer('idbarang')->nullable();
            $table->string('nama')->nullable();
            $table->dateTime('tgl_pinjam')->nullable();
            $table->string('bukti', 45)->nullable();
            $table->string('nomorbukti', 45)->nullable();
            $table->string('label', 45)->nullable();
            $table->text('catatan')->nullable();
            $table->boolean('kembali')->nullable()->default('0');
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
