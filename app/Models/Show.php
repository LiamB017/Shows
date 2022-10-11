<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Show extends Model
{
    use HasFactory;
    protected $guarded = ['title','genre','synopsis','user_rating','network','creator'.'seasons','src'];
}
