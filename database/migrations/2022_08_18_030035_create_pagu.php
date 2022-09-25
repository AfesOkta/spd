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
        Schema::create('pagu', function (Blueprint $table) {
            $table->increments('id_pagu')->primary;
            $table->string('akun', 10)->unique('kode_akun');
            $table->integer('pagu',0,1);
            $table->integer('realisasi',0,1);
            $table->integer('sisa',0,1);
            $table->text('ket')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pagu');
    }
};
