<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CountryDes extends Model
{
    use HasFactory;

    function images(){
        return $this->hasMany(CountryDesImage::class);
    }
    function country(){
        return $this->belongsTo(Country::class);
    }
}
