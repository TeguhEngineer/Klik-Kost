<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detailFasilitas extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function kost() {
        return $this->belongsTo(kost::class,'kost_id', 'id');
    }

    public function fasilitas() {
        return $this->belongsTo(fasilitas::class,'fasilitas_id', 'id');
    }
}
