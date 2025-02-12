<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory;
    protected $table = 'ref_hotel';
    protected $fillable = [
        'namahotel',
        'foto',
        'ket',
        'status',
    ];
}
