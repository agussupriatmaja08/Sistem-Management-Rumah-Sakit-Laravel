<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Rujukan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rujukan', function (Blueprint $table) {
            $table->integer("id");
            $table->string("nama");
            $table->string("jenisKelamin");
            $table->date("tl");
            $table->string("umur");
            $table->string("alamat");
            $table->string("noTelp");
            $table->text("keluhan");
            $table->text("diagnosa");
            $table->string("dokter");
            $table->string("pRujukan");
            $table->string("dRujukan");
            $table->date("tglRujukan");
            $table->increments("idRujukan")->primary;
            $table->string("obat");
            $table->string("nik");

    
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
        Schema::dropIfExists('rujukan');
    }
}
