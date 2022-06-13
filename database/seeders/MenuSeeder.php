<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::statement('SET FOREIGN_KEY_CHECKS=0');
        \DB::table('menus')->truncate();
        \DB::table('menus')->insert([
            [
                'id' => '1',
                'nama' =>  'Lobster Bisque',
                'jenis' =>  'Starters',
                'harga' => '$5.95',
                'deskripsi' => 'Lorem, deren, trataro, filede, nerada'

            ],
            [
                'id' => '2',
                'nama' =>  'Mozzarella Stick',
                'jenis' =>  'Starters',
                'harga' => '$4.95',
                'deskripsi' => 'Lorem, deren, trataro, filede, nerada'

            ],
            [
                'id' => '3',
                'nama' =>  'Crab Cake',
                'jenis' =>  'Starters',
                'harga' => '$7.95',
                'deskripsi' => 'A delicate crab cake served on a toasted roll with lettuce and tartar sauce'

            ],
            [
                'id' => '4',
                'nama' =>  'Caesar Selections',
                'jenis' =>  'Salads',
                'harga' => '$8.95',
                'deskripsi' => 'Caesar Selections'

            ],
            [
                'id' => '5',
                'nama' =>  'Spinach Salad',
                'jenis' =>  'Salads',
                'harga' => '$9.95',
                'deskripsi' => 'Fresh spinach with mushrooms, hard boiled egg, and warm bacon vinaigrette'

            ],
            [
                'id' => '6',
                'nama' =>  'Greek Salad',
                'jenis' =>  'Salads',
                'harga' => '$9.95',
                'deskripsi' => 'Fresh spinach, crisp romaine, tomatoes, and Greek olives'

            ],
            [
                'id' => '7',
                'nama' =>  'Bread Barrel',
                'jenis' =>  'Specialty',
                'harga' => '$6.95',
                'deskripsi' => 'Lorem, deren, trataro, filede, nerada'

            ],
            [
                'id' => '8',
                'nama' =>  'Lobster Roll',
                'jenis' =>  'Specialty',
                'harga' => '$12.95',
                'deskripsi' => 'Plump lobster meat, mayo and crisp lettuce on a toasted bulky roll'

            ],
            [
                'id' => '9',
                'nama' =>  'Tuscan Grilled',
                'jenis' =>  'Specialty',
                'harga' => '$9.95',
                'deskripsi' => 'Grilled chicken with provolone, artichoke hearts, and roasted red pesto'

            ]
        
        ]);
    }
}
