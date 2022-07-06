<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\DataakumulasipoinExport;
use Maatwebsite\Excel\Facades\Excel;

class DataakumulasipoinController extends Controller
{
    //
    public function export() 
    {
        return Excel::download(new DataakumulasipoinExport, 'data-akumulasipoin ' .now(). '.xlsx');
    }
}
