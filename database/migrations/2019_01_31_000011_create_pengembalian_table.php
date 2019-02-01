<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePengembalianTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'pengembalian';

    /**
     * Run the migrations.
     * @table pengembalian
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('idpengembalian');
            $table->integer('idpeminjaman')->nullable();
            $table->integer('iduser')->nullable();
            $table->dateTime('tgl_kembali')->nullable();
            $table->string('sendiri', 128)->nullable()->comment('sendiri, lain, custom');
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
