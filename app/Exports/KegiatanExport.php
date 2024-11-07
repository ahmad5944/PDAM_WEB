<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;
use App\Models\Kegiatan;

class KegiatanExport implements FromCollection, WithHeadings, WithTitle
{
    public function collection()
    {
        return Kegiatan::all(['date', 'regu', 'deskripsi']); 
    }

    public function headings(): array
    {
        return [
            'TANGGAL HARI',
            'REGU',
            'DESKRIPSI KEGIATAN'
        ];
    }

    public function title(): string
    {
        return 'Kegiatan';  
    }
}