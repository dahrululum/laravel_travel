<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jenispaket extends Model
{
    use HasFactory;
    protected $table = 'ref_jenispaket';
    protected $fillable = [
        'namajenis',
        'alias',
        'lamahari',
        'ket',
        'status',
    ];
}
