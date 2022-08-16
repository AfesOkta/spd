<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pangkat', function (Blueprint $table) {
            $table->increments('id_pangkat')->primary;
            $table->string('nama_pangkat', 30);
        });
        Schema::create('golongan', function (Blueprint $table) {
            $table->increments('id_golongan')->primary;
            $table->string('nama_golongan', 30);
        });
        Schema::create('satker', function (Blueprint $table) {
            $table->increments('id_satker')->primary;
            $table->string('nama_satker', 30);
        });
        Schema::create('status', function (Blueprint $table) {
            $table->increments('id_status')->primary;
            $table->string('nama_status', 30);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pangkat');
        Schema::dropIfExists('golongan');
        Schema::dropIfExists('satker');
        Schema::dropIfExists('ststus');
    }
};
