<?php

namespace App\Exports;

use App\Models\Datamemberraw;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class DatamemberrawExport implements FromCollection, WithHeadings
{

    public function collection()
    {
        return Datamemberraw::all();
    }

    public function headings(): array {
        return [
            "ID","ID Member","No HP","Status Cek Data","Created At", "Updated At"
        ];
    }

}
