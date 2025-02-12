<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Programhari extends Model
{
    use HasFactory;
    protected $table = 'ref_programhari';
    protected $fillable = [
        'namaprogram',
        'ket',
        'status',
    ];

    public function paket(){
        return $this->hasMany(Paket::class);
    }
}
