<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SetAutoincrement extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::table('tb_keranjang', function (Blueprint $table) {
        //     //
        //     $table->dropIndex('tb_keranjang_notrans_index');
        // });

        Schema::table('tb_belanja', function (Blueprint $table) {
            //
            // $table->dropColumn('noTrans');
            // $table->dropColumn('id');
            // $table->increments('noTrans');
            // $statement = "ALTER TABLE `tb_belanja` AUTO_INCREMENT = 111111;";
            // DB::unprepared($statement);

        });

        Schema::table('tb_keranjang', function (Blueprint $table) {
            
            // $table->foreign('noTrans', 'noTranskeranjang_ifk')->references('noTrans')->on('tb_belanja')->onDelete('CASCADE')->onUpdate('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tb_belanja', function (Blueprint $table) {
            //
        });
    }
}
