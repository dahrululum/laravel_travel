<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persyaratan extends Model
{
    use HasFactory;
    protected $table = 'ref_persyaratan';
    protected $fillable = [
        'alias',
        'tipe',
        'isi',
        'status',
    ];
}
