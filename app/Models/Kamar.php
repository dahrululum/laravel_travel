<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kamar extends Model
{
    use HasFactory;
    protected $table = 'ref_kamar';
    protected $fillable = [
        'namakamar',
        'harga',
        'ket',
        'status',
    ];
}
