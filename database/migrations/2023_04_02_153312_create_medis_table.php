<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medis', function (Blueprint $table) {
            $table->increments("id")->primary;
            $table->string("nama");
            $table->string("jenisKelamin");
            $table->string("kodeRuangan");
            $table->string("elemen");
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('medis');
    }
}
