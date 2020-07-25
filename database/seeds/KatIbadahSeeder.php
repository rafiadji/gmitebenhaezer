<?php

use App\KatIbadah;
use Illuminate\Database\Seeder;

class KatIbadahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        KatIbadah::insert([
            [
                'kategori' => 'Rayon I',
            ],
            [
                'kategori' => 'Rayon II',
            ],
            [
                'kategori' => 'Rayon III',
            ],
            [
                'kategori' => 'Rayon IV',
            ]
        ]);
    }
}
