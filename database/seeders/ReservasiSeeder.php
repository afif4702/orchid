<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReservasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::statement('SET FOREIGN_KEY_CHECKS=0');
        \DB::table('reservasis')->truncate();
        \DB::table('reservasis')->insert([
            [
                'id' => '1',
                'nama' =>  'Andhika',
                'email' =>  'kangenband@gmail.com',
                'no_hp' => '081234216745',
                'jumlah_kursi' => '4',
                'tanggal' => '2022-06-15',
                'waktu' => '10:00:00',
                'jenis' => 'non'

            ],
            [
                'id' => '2',
                'nama' =>  'Boni',
                'email' =>  'storytoy@gmail.com',
                'no_hp' => '08122211882',
                'jumlah_kursi' => '2',
                'tanggal' => '2022-06-12',
                'waktu' => '10:30:00',
                'jenis' => 'tunai'
            ]
        
        
        ]);
    }
}
