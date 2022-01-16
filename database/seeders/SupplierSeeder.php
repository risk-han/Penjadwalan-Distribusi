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
                'city_id' => 278,
                'province_id' => 34
            ],
            [
                'nama_supplier' => 'Pepsodent',
                'city_id' => 153,
                'province_id' => 6
            ],
            [
                'nama_supplier' => 'Tupperware',
                'city_id' => 501,
                'province_id' => 5
            ],
            [
                'nama_supplier' => 'Yamaha',
                'city_id' => 20,
                'province_id' => 21
            ],
        );
        foreach($data as $d){
            Supplier::create([
                'nama_supplier' => $d['nama_supplier'],
                'city_id' => $d['city_id'],
                'province_id' => $d['province_id']
            ]);
        }
    }
}
