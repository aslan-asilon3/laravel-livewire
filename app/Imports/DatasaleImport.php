<?php

namespace App\Imports;

use App\Models\Datasale;
use App\Models\Datamember;
use App\Models\Akumulasipoin;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use App\Helpers\CleanNoHP;
use Maatwebsite\Excel\Concerns\WithProgressBar;

class DatasaleImport implements ToModel,WithStartRow
{

    
    public $rowCount = 0;
    use CleanNoHP;
    
    public function model(array $row)
    {


        // cek no hp data member
        $cekNohp = Datamember::where('no_hp', '=', $this->cek($row[4]))->first();
    

 
        
        // insert data sales
        $UpdateSale = new Datasale;
        $UpdateSale->id_member = $row[1];
        $UpdateSale->batch = $row[2];
        $UpdateSale->poin = $row[3];
        $UpdateSale->no_hp = $this->cek($row[4]);
        $UpdateSale->tanggal = $row[5] ?? date('Y-m-d');
        $UpdateSale->source = $row[6];
        $UpdateSale->recipient = $row[7];
        $UpdateSale->status_member = $cekNohp == null ? "0" : "1"; // jika tdk ada nomor hp maka insert status member 0 klo ada maka insert 1
        $UpdateSale->status_cek_is_member = $row[9];
 
        $UpdateSale->save();

        // Jumlahkan total poin dari batch yang sama
        $SumTotal = Datasale::where('no_hp', '=', $this->cek($row[4]))->where('batch', $row[2])->count();

        // jika nmr hp nya lebih lebih dari 1 maka jumlahkan poin
        if($SumTotal > 1){
            $Sum = Datasale::where('no_hp', '=', $this->cek($row[4]))->where('batch', $row[2])->sum('poin');
            $SumToAkum =  Akumulasipoin::create([
                'id_member'=> $row[1],
                'no_hp'=> $this->cek($row[4]),
                'batch'=> $row[2],
                'poin'=>$Sum,
            ]);
        }


        
        $data_sales = Datasale::whereNull('status_cek_is_member')
        //
        ->where('batch', '2022-21')
        ->take(10000)
        ->get();

       

    }

    public function getRowCount(){
        return $this->rowCount;
    }

    public function startRow(): int
    {
        return 2;
    }
    
}
