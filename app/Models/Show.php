<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Show extends Model
{
    use HasFactory;

// Fillable property is needed as eloquent models are protected against mass assignment vulnerabilities by default
    protected $fillable = ['title','genre','synopsis','user_rating','network','creator','seasons','src'];
}


