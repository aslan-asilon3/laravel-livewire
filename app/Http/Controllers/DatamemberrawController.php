<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Imports\DatamemberrawImport;
use App\Exports\DatamemberrawExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;
use App\Helpers\CleanNoHP;

class DatamemberrawController extends Controller
{
    //

    public function export() 
    {
        return Excel::download(new DatamemberrawExport, 'data-member-raw ' .now(). '.xlsx');
    }


    // public function import(Request $request) 
    // {
    //     $request->validate([
    //         'file' => 'required|max:10000|mimes:xlsx,xls',
    //     ]);
        
    //     $path = $request->file('file');

    //     Excel::import(new DatamemberrawImport, $path); 
        
    //     return back()->with('success', 'Excel Data Member Raw Imported successfully.');
    // }

        public function import(Request $request) 
    {
        $request->validate([
            'file' => 'required|max:10000|mimes:xlsx,xls',
        ]);
        
        $path = $request->file('file');

 
        Excel::import(new DatamemberrawImport,$request->file('file'));
 
            
        return redirect('/datamemberraw')->with('status', 'The file has been excel imported to database ');
    }


}
