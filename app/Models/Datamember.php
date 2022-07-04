<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Datamember extends Model
{
    use HasFactory;

    use HasFactory;
    protected $table = 'datamembers';
    protected $guarded = [];

    protected $fillable = [
        'id_member',
        'no_hp',
    ];
}
