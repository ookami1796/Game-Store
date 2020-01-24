<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama',255);
            $table->string('username',255)->unique('username_unique');
            $table->string('password',255);
            $table->string('no_telp', 12);
            $table->string('photo',255)->nullable();
            $table->enum('role',array('admin','pelanggan'))->default('pelanggan');
            $table->text('alamat',65535);
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
        Schema::dropIfExists('user');
    }
}
