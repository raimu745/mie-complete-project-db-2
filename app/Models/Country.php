<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    function CountryDes(){
        return $this->hasMany(CountryDes::class,'country_id','id');
    }
    function images(){
        return $this->hasMany(CountryImage::class);
    }
    function image(){
        return $this->hasOne(CountryImage::class);
    }
}
