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
        Schema::create('kwitansi', function (Blueprint $table) {
            $table->increments('id_kwitansi')->primary;
            $table->string('no_spd', 155);
            $table->text('rincian');
            $table->integer('giat');
            $table->integer('biaya');
            $table->text('keterangan')->nullable();
            $table->string('id_pembayaran', 11);
            $table->boolean('rill')->default(0)->nullable();
        });
        Schema::create('daftar_pengeluaran_ril', function (Blueprint $table) {
            $table->increments('id_pengeluaran')->primary;
            $table->string('no_spd', 155);
            $table->text('rincian');
            $table->integer('giat');
            $table->integer('biaya');
            $table->text('keterangan')->nullable();
            $table->string('id_pembayaran', 11);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kwitansi');
        Schema::dropIfExists('daftar_pengeluaran_ril');
    }
};
