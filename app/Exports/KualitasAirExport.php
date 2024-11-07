<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;
use App\Models\KualitasAir;

class KualitasAirExport implements FromCollection, WithHeadings, WithTitle
{
    public function collection()
    {
        return KualitasAir::all(['created_at', 'air_baku', 'air_bersih', 'ph']);  
    }

    public function headings(): array
    {
        return [
            'JAM TANGGAL',
            'AIR BAKU',
            'AIR BERSIH',
            'LEVEL RESEVOAR'
        ];
    }

    public function title(): string
    {
        return 'Kualitas Air'; 
    }
}