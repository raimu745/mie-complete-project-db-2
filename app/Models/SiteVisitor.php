<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteVisitor extends Model
{
    use HasFactory;
    protected $fillable = ['ip_address','country_name','country_code','region_code','region_name','city_name','zip_code','latitude','longitude','area_code'];


}
