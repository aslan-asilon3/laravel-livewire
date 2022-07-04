<?php

namespace App\Imports;

use App\Models\Datamemberraw;
use App\Models\Datamember;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use App\Helpers\CleanNoHP;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithProgressBar;

class DatamemberrawImport implements ToModel, WithStartRow
{
    
    use CleanNoHP;

    public function model(array $row)
    {
        

        $UpdateMember = new Datamemberraw;
 
        $UpdateMember->id_member = $row[1];
        $UpdateMember->no_hp = $this->cek($row[2]);
        $UpdateMember->status_cek_data = $row[3];
 
        $UpdateMember->save();

        $cekNohp = Datamember::where('no_hp', '=', $this->cek($row[2]))->first();
        // dd($cekNohp);

        // jika nmr hp  ada maka update id member tsble data member
        if($cekNohp){
            
            $cekNohp->update([
                'id_member' => $this->cek($row[1])
            ]);

        } // jika tidak ada no hp maka update id_member terbaru dan masukan no hp
        else{
            Datamember::create([
            'id_member'           => $row[1],
            'no_hp'               => $this->cek($row[2]),
        ]);
        }



    }
    

    public function getRowCount(){
        return $this->rowCount;
    }

    public function startRow(): int
    {
        return 2;
    }

}
