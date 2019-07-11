<?php

use Illuminate\Database\Seeder;
use App\Master\satuanModel;
use App\Master\kategoriModel;
use App\Master\productModel;
use Carbon\Carbon;

class productSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // satuanModel::insert([
        //     [
        //         'kdSatuan' => 'PCS',
        //         'namaSatuan' => 'PCS',
        //     ],
        //     [
        //         'kdSatuan' => 'DUS',
        //         'namaSatuan' => 'DUS',
        //     ],
        //     [
        //         'kdSatuan' => 'PKT',
        //         'namaSatuan' => 'PAKET',
        //     ],
        //     [
        //         'kdSatuan' => 'BOX',
        //         'namaSatuan' => 'BOX',
        //     ]
        // ]);

        kategoriModel::insert([
            [
                'kdKategori' => 'CPL',
                'namaKategori' => 'Pakaian Couple Pria dan Wanita',
            ],
            [
                'kdKategori' => 'KK',
                'namaKategori' => 'Baju Koko',
            ],
            [
                'kdKategori' => 'MKN',
                'namaKategori' => 'Mukenah',
            ],
            [
                'kdKategori' => 'DRS',
                'namaKategori' => 'Dress',
            ],
        ]);

        productModel::insert([
            [
                'kdProduct'     => 'KD001',
                'namaProduct'   => 'Ayyas',
                'kdKategori'    => 'CPL',
                'kdSatuan'      => 'PCS',
                'hargaJual'     => 150000,
                'diskon'        => 0,
                'deskripsi'     => 'Baju Couple Untuk Pasangan Pria dan Wanita',
                'promo'         => 'T',
                'urlFoto'       => '',
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now(),
            ],
            [
                'kdProduct'     => 'KD002',
                'namaProduct'   => 'Bianca',
                'kdKategori'    => 'CPL',
                'kdSatuan'      => 'PCS',
                'hargaJual'     => 200000,
                'diskon'        => 0,
                'deskripsi'     => 'Baju Couple Untuk Pasangan Pria dan Wanita',
                'promo'         => 'T',
                'urlFoto'       => '',
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now(),
            ],
            [
                'kdProduct'     => 'KD003',
                'namaProduct'   => 'Couple Fajrina',
                'kdKategori'    => 'CPL',
                'kdSatuan'      => 'PCS',
                'hargaJual'     => 125000,
                'diskon'        => 10000,
                'deskripsi'     => 'Baju Couple Untuk Pasangan Pria dan Wanita',
                'promo'         => 'Y',
                'urlFoto'       => '',
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now(),
            ],
            [
                'kdProduct'     => 'KD004',
                'namaProduct'   => 'Couple Maharani',
                'kdKategori'    => 'CPL',
                'kdSatuan'      => 'PCS',
                'hargaJual'     => 50000,
                'diskon'        => 0,
                'deskripsi'     => 'Baju Couple Untuk Pasangan Pria dan Wanita',
                'promo'         => 'Y',
                'urlFoto'       => '',
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now(),
            ],
            [
                'kdProduct'     => 'KD005',
                'namaProduct'   => 'Funo',
                'kdKategori'    => 'KK',
                'kdSatuan'      => 'PCS',
                'hargaJual'     => 50000,
                'diskon'        => 0,
                'deskripsi'     => 'Baju Koko Untuk Anak Laki - Laki',
                'promo'         => 'Y',
                'urlFoto'       => '',
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now(),
            ],
            [
                'kdProduct'     => 'KD006',
                'namaProduct'   => 'Adnan',
                'kdKategori'    => 'KK',
                'kdSatuan'      => 'PCS',
                'hargaJual'     => 50000,
                'diskon'        => 0,
                'deskripsi'     => 'Baju Koko Untuk Anak Laki - Laki',
                'promo'         => 'Y',
                'urlFoto'       => '',
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now(),
            ],
            [
                'kdProduct'     => 'KD007',
                'namaProduct'   => 'Ahmad',
                'kdKategori'    => 'KK',
                'kdSatuan'      => 'PCS',
                'hargaJual'     => 50000,
                'diskon'        => 0,
                'deskripsi'     => 'Baju Koko Untuk Pria Dewasa',
                'promo'         => 'Y',
                'urlFoto'       => '',
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now(),
            ],
            [
                'kdProduct'     => 'KD009',
                'namaProduct'   => 'Baim Koko',
                'kdKategori'    => 'KK',
                'kdSatuan'      => 'PCS',
                'hargaJual'     => 50000,
                'diskon'        => 0,
                'deskripsi'     => 'Baju Koko Untuk Anak Laki - Laki',
                'promo'         => 'Y',
                'urlFoto'       => '',
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now(),
            ],
            [
                'kdProduct'     => 'KD010',
                'namaProduct'   => 'Azka jubah',
                'kdKategori'    => 'KK',
                'kdSatuan'      => 'PCS',
                'hargaJual'     => 50000,
                'diskon'        => 0,
                'deskripsi'     => 'Baju Koko Untuk Anak Laki - Laki',
                'promo'         => 'Y',
                'urlFoto'       => '',
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now(),
            ],
            [
                'kdProduct'     => 'KD008',
                'namaProduct'   => 'Pasha',
                'kdKategori'    => 'KK',
                'kdSatuan'      => 'PCS',
                'hargaJual'     => 50000,
                'diskon'        => 0,
                'deskripsi'     => 'Baju Koko Untuk Anak Laki - Laki',
                'promo'         => 'Y',
                'urlFoto'       => '',
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now(),
            ],
        ]);

    }
}
