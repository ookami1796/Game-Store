<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCheckoutTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('checkout', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->integer('id_user')->index('id_user_foreign');
            $table->integer('id_troli')->index('id_troli_foreign');
            $table->integer('id_pembayaran')->index('id_pembayaran_foreign');
            $table->integer('id_ekspedisi')->index('id_ekspedisi_foreign');
            $table->enum('durasi',array('instan','Next day','regular(2-3 hari)'))->default('instan');
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
        Schema::dropIfExists('checkout');
    }
}
