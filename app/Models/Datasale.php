<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Datasale extends Model
{
    use HasFactory;
    protected $table = 'datasales';
    protected $guarded = [];

    protected $fillable = [
        'id_member',
        'batch',
        'no_hp',
        'tanggal',
        'source',
        'recipient',
        'status_member',
        'status_cek_is_member',
    ];
}
