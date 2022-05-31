<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    public function schedule()
    {
        return $this->hasMany(Schedule::class, 'service_id', 'id');
    }
}
