<?php

use App\Jabatan;
use Illuminate\Database\Seeder;

class JabatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Jabatan::insert([
            [
                'jabatan' => 'majelis',
            ],
            [
                'jabatan' => 'staff',
            ],
            [
                'jabatan' => 'jemaat',
            ]
        ]);
    }
}
