<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TrigerUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        DB::unprepared('CREATE TRIGGER BImember BEFORE INSERT ON `tb_member` FOR EACH ROW
                BEGIN
                   INSERT INTO `tb_user` (`email`, `username`, `password` , `hakAkses` , `noHp`, `created_at`, `updated_at`) VALUES (NEW.email, NEW.username, NEW.password, \'customer\' , NEW.nohp ,NEW.created_at, NEW.updated_at);
                END');

        DB::unprepared('CREATE TRIGGER ADmember AFTER DELETE ON `tb_member` FOR EACH ROW
                BEGIN
                   DELETE FROM `tb_user` WHERE `tb_user`.`username` = OLD.username;
                END');
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
            DB::unprepared( 'DROP TRIGGER `BImember`');
            DB::unprepared( 'DROP TRIGGER `ADmember`');
    }
}
