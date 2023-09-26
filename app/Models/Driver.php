<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    use HasFactory;

    public function drivered()
    {
        return $this->hasMany(Rental::class, 'driver_id');
    }
}
