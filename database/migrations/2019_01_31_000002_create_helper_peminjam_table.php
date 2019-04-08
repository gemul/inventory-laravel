<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHelperPeminjamTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'helper_peminjam';

    /**
     * Run the migrations.
     * @table helper_peminjam
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->string('peminjam_text',45);
            $table->string('peminjam_bukti',45);
            $table->string('peminjam_nomorbukti', 45)->nullable();
            $table->boolean('deleted')->nullable()->default(null);
            $table->dateTime('created')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));
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
