<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\StatusPenjadwalan;


class StatusPenjadwalanSeeder extends Seeder
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
                'status' => 'Menunggu',
            ],
            [
                'status' => 'Selesai',
            ],
        );
        foreach($data as $d){
            StatusPenjadwalan::create([
                'status' => $d['status'],
            ]);
        }
    }
}
