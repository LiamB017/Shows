<?php

namespace App\Models;

use App\Models\Show;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Actor extends Model
{
    use HasFactory;

    public function shows()
    {
        return $this->belongstoMany(Show::class)->withTimestamps();
    }
}
