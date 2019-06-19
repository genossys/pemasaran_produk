<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TbTransaksi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('tb_keranjang', function(Blueprint $table){
            $table->increments('id');
            $table->string('noTrans', '191')->index()->nullable();
            $table->date('tanggal');
            $table->string('username','191')->index();
            $table->string('kdProduct','15')->index();
            $table->bigInteger('qty')->default('0');
            $table->bigInteger('diskon')->default('0');
            $table->enum('checkout',['0','1'])->default('0');
            $table->timestamps();
        });

        Schema::create('tb_belanja', function(Blueprint $table){
            $table->increments('id');
            $table->string('noTrans','191')->unique();
            $table->string('username','191')->index();
            $table->date('tanggal');
            $table->bigInteger('subTotal')->default('0');
            $table->bigInteger('diskon')->default('0');
            $table->string('urlBukti','255');
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
        //
        Schema::dropIfExists('tb_keranjang');
        Schema::dropIfExists('tb_belanja');
    }
}
