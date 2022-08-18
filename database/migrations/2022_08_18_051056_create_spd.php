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
        Schema::create('spd', function (Blueprint $table) {
            $table->increments('id_spd')->primary;
            $table->string('no_spd', 30);
            $table->string('tanggal_spd', 20);
            $table->string('jenis_spd', 50);
            $table->string('nrp', 10);
            $table->text('keperluan');
            $table->string('asal_spd', '155');
            $table->string('tujuan_spd', '155');
            $table->string('tanggal_berangkat', '20');
            $table->string('tanggal_kembali', '20');
            $table->string('no_sprin', '20');
            $table->string('tanggal_sprin', '20');
            $table->string('mata_anggaran', '20');
            $table->string('jenis_pengeluaran', '20');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('spd');
    }
};
