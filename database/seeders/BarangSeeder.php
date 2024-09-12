<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'barang_id' => 1,
                'kategori_id' => 1,
                'barang_kode' => '001',
                'barang_nama' => 'Laptop',
                'harga_beli' => 5000000,
                'harga_jual' => 6000000,
            ],
            [
                'barang_id' => 2,
                'kategori_id' => 1,
                'barang_kode' => '002',
                'barang_nama' => 'Smartphone',
                'harga_beli' => 2000000,
                'harga_jual' => 2500000,
            ],
            [
                'barang_id' => 3,
                'kategori_id' => 1,
                'barang_kode' => '003',
                'barang_nama' => 'Kaos Polos',
                'harga_beli' => 50000,
                'harga_jual' => 75000,
            ],
            [
                'barang_id' => 4,
                'kategori_id' => 2,
                'barang_kode' => '004',
                'barang_nama' => 'Jaket Denim',
                'harga_beli' => 150000,
                'harga_jual' => 200000,
            ],
            [
                'barang_id' => 5,
                'kategori_id' => 2,
                'barang_kode' => '005',
                'barang_nama' => 'Kopi Bubuk',
                'harga_beli' => 30000,
                'harga_jual' => 50000,
            ],
            [
                'barang_id' => 6,
                'kategori_id' => 2,
                'barang_kode' => '006',
                'barang_nama' => 'Susu Cair',
                'harga_beli' => 10000,
                'harga_jual' => 15000,
            ],
            [
                'barang_id' => 7,
                'kategori_id' => 3,
                'barang_kode' => '007',
                'barang_nama' => 'Vitamin C',
                'harga_beli' => 50000,
                'harga_jual' => 80000,
            ],
            [
                'barang_id' => 8,
                'kategori_id' => 3,
                'barang_kode' => '008',
                'barang_nama' => 'Masker Wajah',
                'harga_beli' => 2000,
                'harga_jual' => 5000,
            ],
            [
                'barang_id' => 9,
                'kategori_id' => 3,
                'barang_kode' => '009',
                'barang_nama' => 'Kursi Lipat',
                'harga_beli' => 100000,
                'harga_jual' => 150000,
            ],
            [
                'barang_id' => 10,
                'kategori_id' => 4,
                'barang_kode' => '010',
                'barang_nama' => 'Meja Tulis',
                'harga_beli' => 250000,
                'harga_jual' => 300000,
            ],
            [
                'barang_id' => 11,
                'kategori_id' => 4,
                'barang_kode' => '011',
                'barang_nama' => 'Bulpoin',
                'harga_beli' => 2500,
                'harga_jual' => 3000,
            ],
            [
                'barang_id' => 12,
                'kategori_id' => 4,
                'barang_kode' => '012',
                'barang_nama' => 'Pensil',
                'harga_beli' => 2000,
                'harga_jual' => 3500,
            ],
            [
                'barang_id' => 13,
                'kategori_id' => 5,
                'barang_kode' => '013',
                'barang_nama' => 'Aqua',
                'harga_beli' => 5000,
                'harga_jual' => 6000,
            ],
            [
                'barang_id' => 14,
                'kategori_id' => 5,
                'barang_kode' => '014',
                'barang_nama' => 'Type X',
                'harga_beli' => 4000,
                'harga_jual' => 5000,
            ],
            [
                'barang_id' => 15,
                'kategori_id' => 5,
                'barang_kode' => '015',
                'barang_nama' => 'Tas',
                'harga_beli' => 20000,
                'harga_jual' => 30000,
            ]
        ];

        DB::table('m_barang')->insert($data);
    }
}
