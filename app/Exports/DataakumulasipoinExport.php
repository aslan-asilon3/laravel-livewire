<?php

namespace App\Exports;

use App\Models\Akumulasipoin;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class DataakumulasipoinExport implements FromCollection, WithHeadings
{

    
    public function collection()
    {
        return Akumulasipoin::all();
    }

    public function headings(): array {
        return [
            "ID","ID Member","No HP","Batch","Poin"
        ];
    }
}
