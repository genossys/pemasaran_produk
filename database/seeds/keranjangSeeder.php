<?php

use Illuminate\Database\Seeder;
use App\Transaksi\KeranjangModel;

class keranjangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        KeranjangModel::insert([
            [
                'noTrans' => NULL,
                'tanggal' => '2019-06-20',
                'username' => 'bagus',
                'kdProduct' => 'KD001',
                'qty' => 2,
                'diskon' => 1000,
                'checkout' => '0'
            ],
            [
                'noTrans' => NULL,
                'tanggal' => '2019-06-20',
                'username' => 'bagus',
                'kdProduct' => 'KD003',
                'qty' => 5,
                'diskon' => 0,
                'checkout' => '0'
            ],
            [
                'noTrans' => NULL,
                'tanggal' => '2019-06-20',
                'username' => 'bagus',
                'kdProduct' => 'KD009',
                'qty' => 1,
                'diskon' => 2000,
                'checkout' => '0'
            ],
            [
                'noTrans' => NULL,
                'tanggal' => '2019-06-20',
                'username' => 'bagus',
                'kdProduct' => 'KD007',
                'qty' => 6,
                'diskon' => 500,
                'checkout' => '0'
            ],
        ]);
    }
}
