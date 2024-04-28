<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class areaKampus extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function kost() {
        return $this->hasMany(kost::class,'area_id', 'id');
    }
}
