<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Barang;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = array(
            [
                'kode_barang' => 'BRG001',
                'id_kategori' => 1,
                'id_supplier' => 1,
                'nama_barang' => 'Meja Belajar',
                'berat_barang' => 12,
                'stok' => 15
            ],
            [
                'kode_barang' => 'BRG002',
                'id_kategori' => 2,
                'id_supplier' => 2,
                'nama_barang' => 'Beras',
                'berat_barang' => 12,
                'stok' => 15
            ],
            [
                'kode_barang' => 'BRG003',
                'id_kategori' => 3,
                'id_supplier' => 3,
                'nama_barang' => 'Pakaian Sekolah',
                'berat_barang' => 12,
                'stok' => 15
            ],
            [
                'kode_barang' => 'BRG004',
                'id_kategori' => 4,
                'id_supplier' => 4,
                'nama_barang' => 'Kemeja',
                'berat_barang' => 12,
                'stok' => 15
            ],
            [
                'kode_barang' => 'BRG005',
                'id_kategori' => 5,
                'id_supplier' => 1,
                'nama_barang' => 'Bubuk Susu',
                'berat_barang' => 12,
                'stok' => 15
            ],
        );
        foreach($data as $d){
            Barang::create([
                'kode_barang' => $d['kode_barang'],
                'id_kategori' => $d['id_kategori'],
                'id_supplier' => $d['id_supplier'],
                'nama_barang' => $d['nama_barang'],
                'berat_barang' => $d['berat_barang'],
                'stok' => $d['stok'],
            ]);
        }
    }
}
