<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('no_seri')->unique();
            $table->string('nama_produk', 255);
            $table->integer('id_kategori')->index('id_kategori_foreign');
            $table->string('harga', 255);
            $table->string('photo_produk', 255)->nullable();
            $table->text('deskripsi', 65534);
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
        Schema::dropIfExists('product');
    }
}
