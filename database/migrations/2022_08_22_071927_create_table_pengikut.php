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
        Schema::create('pengikut', function (Blueprint $table) {
            $table->increments('id_pengikut');
            $table->integer('id_spd', 0,1);
            $table->integer('nrp',0,1);
            $table->integer('lama_hari');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('table_pengikut');
    }
};
