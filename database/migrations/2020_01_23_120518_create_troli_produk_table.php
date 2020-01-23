<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTroliProdukTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('troli_produk', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_troli')->unsigned();
            $table->bigInteger('id_produk')->unsigned();
            $table->integer('jumlah_produk')->unsigned();
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
        Schema::dropIfExists('troli_produk');
    }
}
