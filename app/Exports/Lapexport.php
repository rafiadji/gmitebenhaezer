<?php

namespace App\Exports;

use App\Keuangan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;

class Lapexport implements FromCollection, WithMapping, WithHeadings, ShouldAutoSize, WithColumnFormatting
{
    protected $year, $month;

    public function __construct($year, $month)
    {
        $this->year = $year;
        $this->month = $month;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        if ($this->month == 'all') {
            return Keuangan::whereYear('tgl_keuangan', $this->year)
            ->orderby('tgl_keuangan')
            ->get();
        }
        else{
            return Keuangan::whereYear('tgl_keuangan', $this->year)
            ->whereMonth('tgl_keuangan', $this->month)
            ->orderby('tgl_keuangan')
            ->get();
        }
    }

    /**
    * @var Keuangan $keuangan
    */
    public function map($keuangan): array
    {
        $kred = "";
        $deb = "";
        if ($keuangan->id_set == '1' || $keuangan->id_set == '2') {
            $ket = $keuangan->keterangan_lain;
        }
        else{
            $ket = $keuangan->setting->keterangan;
        }
        if ($keuangan->setting->jenis_keuangan == 'pemasukan') {
            $kred = $keuangan->nominal;
        }
        if ($keuangan->setting->jenis_keuangan == 'pengeluaran') {
            $deb = abs($keuangan->nominal);
        }
        return [
            $keuangan->tgl_keuangan,
            $ket,
            $kred,
            $deb,
        ];
    }

    public function headings(): array
    {
        return [
            'Tanggal',
            'Keterangan',
            'Kredit',
            'Debit',
        ];
    }

    public function columnFormats(): array
    {
        return [
            'C' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
            'D' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
        ];
    }
}
