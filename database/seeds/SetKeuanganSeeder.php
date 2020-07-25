<?php

use App\SetKeuangan;
use Illuminate\Database\Seeder;

class SetKeuanganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SetKeuangan::insert([
            [
                'keterangan' => 'Pemasukan Lain',
                'jenis_keuangan' => 'pemasukan',
            ],
            [
                'keterangan' => 'Pengeluaran Lain',
                'jenis_keuangan' => 'pengeluaran',
            ]
        ]);
    }
}
