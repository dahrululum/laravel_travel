<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paket extends Model
{
    use HasFactory;
    protected $table = 'data_paket';
    protected $fillable = [
        'namapaket',
        'slug',
        'jenispaket_id',
        'programhari_id',
        'hotel_id',
        'kamar_id',
        'itinerary_id',
        'maskapai_id',
        'fasilitas_id',
        'syarat_id',
        'images',
        'deskripsi',
        'is_active',
        'stok'

    ];
    
    protected $cast = [
        'images'    => 'array',
    ];

    public function jenispaket(){
        return $this->belongsTo(Jenispaket::class);
    }
    public function programhari(){
        return $this->belongsTo(Programhari::class);
    }
    public function order(){
        return $this->hasMany(Order::class);
    }

}
