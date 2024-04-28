<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class fasilitas extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function details() {
        return $this->hasMany(detailFasilitas::class,'fasilitas_id', 'id');
    }

    public function kost() {
        return $this->belongsTo(kost::class,'kost_id', 'id');
    }
}
