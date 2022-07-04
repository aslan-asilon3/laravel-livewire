<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Akumulasipoin extends Model
{
    use HasFactory;

    protected $table = 'akumulasipoins';
    protected $guarded = [];

    protected $fillable = [
        'id_member',
        'no_hp',
        'batch',
        'poin',
    ];

}
