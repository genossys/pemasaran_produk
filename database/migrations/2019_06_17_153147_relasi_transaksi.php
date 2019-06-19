<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RelasiTransaksi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('tb_keranjang', function (Blueprint $table) {
            $table->foreign('noTrans', 'noTranskeranjang_ifk')->references('noTrans')->on('tb_belanja')->onDelete('CASCADE')->onUpdate('CASCADE');
        });

        Schema::table('tb_keranjang', function (Blueprint $table) {
            $table->foreign('username', 'usernamekeranjang_ifk')->references('username')->on('tb_user')->onDelete('CASCADE')->onUpdate('CASCADE');
        });

        Schema::table('tb_keranjang', function (Blueprint $table) {
            $table->foreign('kdProduct', 'kdproductkeranjang_ifk')->references('kdProduct')->on('tb_product')->onDelete('CASCADE')->onUpdate('CASCADE');
        });
        Schema::table('tb_belanja', function (Blueprint $table) {
            $table->foreign('username', 'usernamebelanja_ifk')->references('username')->on('tb_user')->onDelete('CASCADE')->onUpdate('CASCADE');
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
        Schema::table('tb_keranjang', function(Blueprint $table){
            $table->dropForeign( 'noTranskeranjang_ifk');
            $table->dropForeign( 'usernamekeranjang_ifk');
            $table->dropForeign( 'kdproductkeranjang_ifk');
        });
        Schema::table('tb_belanja', function(Blueprint $table){
            $table->dropForeign( 'usernamebelanja_ifk');
        });
    }
}
