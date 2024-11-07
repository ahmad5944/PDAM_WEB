<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;
use App\Models\StandMeter;

class StandMeterExport implements FromCollection, WithHeadings, WithTitle
{
    public function collection()
    {
        return StandMeter::all(['created_at', 'stand1']);  
    }

    public function headings(): array
    {
        return [
            'JAM TANGGAL',
            'STAND METER'
        ];
    }

    public function title(): string
    {
        return 'Stand Meter';  
    }
}