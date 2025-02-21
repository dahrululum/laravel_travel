<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Maskapai extends Model
{
    use HasFactory;
    protected $table = 'ref_maskapai';
    protected $fillable = [
        'namamaskapai',
        'bandara',
        'ket',
        'status',
    ];
}
