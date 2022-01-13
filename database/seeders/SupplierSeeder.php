<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Supplier;

class SupplierSeeder extends Seeder
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
                'nama_supplier' => 'Unilever',
                'kota_supplier' => 'Medan',
                'provinsi_supplier' => 'Sumatera Utara'
            ],
            [
                'nama_supplier' => 'Pepsodent',
                'kota_supplier' => 'Jakarta',
                'provinsi_supplier' => 'DKI Jakarta'
            ],
            [
                'nama_supplier' => 'Tupperware',
                'kota_supplier' => 'Yogyakarta',
                'provinsi_supplier' => 'DI Yogyakarta'
            ],
            [
                'nama_supplier' => 'Yamaha',
                'kota_supplier' => 'Aceh',
                'provinsi_supplier' => 'Nagroe Aceh Darussalam'
            ],
        );
        foreach($data as $d){
            Supplier::create([
                'nama_supplier' => $d['nama_supplier'],
                'kota_supplier' => $d['kota_supplier'],
                'provinsi_supplier' => $d['provinsi_supplier']
            ]);
        }
    }
}
