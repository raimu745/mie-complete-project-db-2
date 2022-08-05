<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CountryImage extends Model
{
    use HasFactory;
    protected $fillable = ['image','country_id'];
}
