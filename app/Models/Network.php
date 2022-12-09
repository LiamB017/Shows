<?php

namespace App\Models;

use App\Models\Actor;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Network extends Model
{
    use HasFactory;
     protected $fillable = ['name', 'address'];


    public function shows (
    )
    {
        return $this->hasMany(Show::class);
    
    }
}
