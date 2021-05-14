<?php

use App\SetMajelis;
use Illuminate\Database\Seeder;

class SetMajelisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SetMajelis::insert([
            [
                'jabatan_majelis' => 'Ketua',
                'urutan' => '100',
                'animasi' => 'fade-right',
            ],
            [
                'jabatan_majelis' => 'Wakil Ketua I',
                'urutan' => '200',
                'animasi' => 'fade-up',
            ],
            [
                'jabatan_majelis' => 'Wakil Ketua II',
                'urutan' => '300',
                'animasi' => 'fade-up',
            ],
            [
                'jabatan_majelis' => 'Wakil Ketua III',
                'urutan' => '400',
                'animasi' => 'fade-left',
            ],
            [
                'jabatan_majelis' => 'Sekretaris',
                'urutan' => '500',
                'animasi' => 'fade-right',
            ],
            [
                'jabatan_majelis' => 'Wakil Sekretaris',
                'urutan' => '600',
                'animasi' => 'fade-up',
            ],
            [
                'jabatan_majelis' => 'Bendahara',
                'urutan' => '700',
                'animasi' => 'fade-up',
            ],
            [
                'jabatan_majelis' => 'Wakil Bendahara',
                'urutan' => '800',
                'animasi' => 'fade-left',
            ],
        ]);
    }
}
