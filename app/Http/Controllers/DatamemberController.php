<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Exports\DatamemberExport;
use Maatwebsite\Excel\Facades\Excel;

class DatamemberController extends Controller
{
    //

    public function export() 
    {
        return Excel::download(new DatamemberExport, 'data-member ' .now(). '.xlsx');
    }

}
