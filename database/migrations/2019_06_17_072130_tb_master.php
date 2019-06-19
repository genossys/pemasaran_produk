<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TbMaster extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('tb_satuan', function(Blueprint $table){
            $table->string('kdSatuan','10')->primary();
            $table->string('namaSatuan','255');
        });

        Schema::create('tb_kategori', function(Blueprint $table){
            $table->string('kdKategori','10')->primary();
            $table->string('namaKategori','255');
        });

        Schema::create('tb_member', function(Blueprint $table){
            $table->bigIncrements('id');
            $table->string('username', '191')->unique()->index();
            $table->string('email', '191')->unique();
            $table->string('password');
            $table->string('nohp','15');
            $table->text('alamat');
            $table->timestamps();
        });

        Schema::create('tb_product', function(Blueprint $table){
            $table->string('kdProduct','15')->primary();
            $table->string('namaProduct','255');
            $table->string('kdKategori','10')->index();
            $table->string('kdSatuan','10')->index();
            $table->bigInteger('hargaJual')->default('0');
            $table->bigInteger('diskon')->default('0');
            $table->text('deskripsi');
            $table->enum('promo',['Y','T']);
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
        Schema::dropIfExists('tb_kategori');
        Schema::dropIfExists('tb_satuan');
        Schema::dropIfExists('tb_product');
    }
}
