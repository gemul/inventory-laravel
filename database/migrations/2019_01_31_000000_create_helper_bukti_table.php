<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHelperBuktiTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'helper_bukti';

    /**
     * Run the migrations.
     * @table helper_bukti
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->string('bukti_text',45);
            $table->dateTime('deleted')->nullable()->default(null);
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
