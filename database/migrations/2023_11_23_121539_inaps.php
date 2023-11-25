<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Inaps extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inaps', function (Blueprint $table) {
            $table->increments("id")->primary;
            $table->string("idPasien");
            $table->string("nama");
            $table->string("kodeRuangan");
            $table->string("ruangan");
            $table->string("alamat");
            $table->date("tglInap");
            $table->string("noTelp");

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
        Schema::dropIfExists('inaps');
    }
}
