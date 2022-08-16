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
            $table->increments('nrp')->primary;
            $table->string('nama_personel', 50);
            $table->string('jabatan', 50);
            $table->string('pangkat', 10);  // fk
            $table->string('golongan', 10); // fk
            $table->string('satker', 10);   // fk
            $table->string('status', 10);   // fk
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
