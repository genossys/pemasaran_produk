<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TbPembayaran extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_pembayaran', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('noTrans',false,true);
            $table->string('username')->index();
            $table->enum('bank',['BCA', 'BNI', 'BRI', 'MANDIRI']);
            $table->string('urlBukti','191');
            $table->enum('status',['Tunggu','Terima','Tolak']);
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
        Schema::dropIfExists('tb_pembayaran');
    }
}
