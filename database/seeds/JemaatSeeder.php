<?php

use App\Jemaat;
use Illuminate\Database\Seeder;

class JemaatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Jemaat::insert([
            [
                'nik' => '545681325190',
                'id_jabatan' => '1',
                'id_user' => '2',
                'nomer_kk' => '545681325183',
                'name' => 'Josh Yehezkiel',
                'name_baptis' => 'Josh',
                'jk' => 'laki-laki',
                'no_tlp' => '081252692343',
                'tempat_lahir' => 'Malang',
                'tgl_lahir' => '1996-05-05',
                'alamat' => 'Sawojajar, Malang',
                'pekerjaan' => 'Swasta',
                'pendidikan' => 'Sarjana',
                'status_keluarga' => 'anak',
                'status_aktif' => 'aktif',
            ]
        ]);
    }
}
