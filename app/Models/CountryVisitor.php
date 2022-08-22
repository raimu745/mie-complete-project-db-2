<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CountryVisitor extends Model
{
    use HasFactory;
    protected $fillable = ['country_id','ip_address','country_name','country_code','region_code','region_name','city_name','zip_code','latitude','longitude','area_code'];
    function country(){
        return $this->belongsTo(Country::class);
    }
}
