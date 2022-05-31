<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    use HasFactory;

    public function schedule()
    {
        return $this->hasMany(Schedule::class, 'artist_id', 'id');
    }

    public function booking()
    {
        return $this->hasMany(Booking::class, 'artist_id', 'id');
    }
}
