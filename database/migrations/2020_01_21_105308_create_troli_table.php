<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTroliTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('troli', function (Blueprint $table) {
            $table->bigIncrements('id');
            
            $table->integer('id_user')->index('id_user_foreign');
            $table->integer('id_produk')->index('id_produk_foreign');
            $table->integer('jumlah_produk');
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
        Schema::dropIfExists('troli');
    }
}
