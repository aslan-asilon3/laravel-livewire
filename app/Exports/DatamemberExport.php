<?php

namespace App\Exports;

use App\Models\Datamember;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class DatamemberExport implements FromCollection, WithHeadings
{

    public function collection()
    {
        return Datamember::all();
    }

    public function headings(): array {
        return [
            "ID","ID Member","No HP","Created At"
        ];
    }

}
