<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kategori;

class KategoriSeeder extends Seeder
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
                'nama_kategori' => 'Mudah Pecah'
            ],
            [
                'nama_kategori' => 'Simpan di tempat sejuk'
            ],
            [
                'nama_kategori' => 'Tangani dengan hari hati'
            ],
            [
                'nama_kategori' => 'Jangan Diinjak'
            ],
            [
                'nama_kategori' => 'Dapat di Daur Ulang'
            ],
            [
                'nama_kategori' => 'Tidak Boleh Ditumpuk'
            ],
            [
                'nama_kategori' => 'Mudah Meledak'
            ],
            [
                'nama_kategori' => 'Beracun'
            ],
            [
                'nama_kategori' => 'Mudah Terbakar'
            ],
        );
        foreach($data as $d){
            Kategori::create([
                'nama_kategori' => $d['nama_kategori']
            ]);
        }
    }
}
