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
        Schema::create('personel', function (Blueprint $table) {
            $table->string('nrp', 10)->primary();
            $table->string('nama_personel', 100);
            $table->string('jabatan', 255);
            $table->string('id_pangkat', 10);  // fk
            $table->string('id_satker', 10);   // fk
            $table->string('id_status', 10);   // fk
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('personel');
    }
};
