<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\DatasaleImport;
use App\Exports\DatasaleExport;
use App\Models\Datasale;

class DatasaleController extends Controller
{
    //

    public function export() 
    {
        return Excel::download(new DatasaleExport, 'data-sale ' .now(). '.xlsx');
    }

    public function import(Request $request) 
    {
        $request->validate([
            'file' => 'required|max:10000|mimes:xlsx,xls',
        ]);
        
        $path = $request->file('file');
 
        Excel::import(new DatasaleImport,$request->file('file'));
 
            
        return redirect('/datasale')->with('status', 'The file has been excel imported to database ');
    }

}
