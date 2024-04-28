<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kost extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function user() {
        return $this->belongsTo(User::class,'user_id', 'id');
    }

    public function area() {
        return $this->belongsTo(areaKampus::class,'area_id', 'id');
    }

    public function kecamatan() {
        return $this->belongsTo(kecamatan::class,'kecamatan_id', 'id');
    }

    public function gambar() {
        return $this->hasMany(gambar::class,'kost_id', 'id');
    }

    public function details() {
        return $this->hasMany(detailFasilitas::class,'kost_id', 'id');
    }

    public function fasilitas() {
        return $this->hasMany(fasilitas::class,'kost_id', 'id');
    }
}
