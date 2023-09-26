<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Rental extends Model
{
    use HasFactory;

    public function rentalUser(): BelongsTo
    {
        return $this->belongsTo(User::class, 'renter_id');
    }

    public function rentalCar(): BelongsTo
    {
        return $this->belongsTo(Car::class, 'car_id');
    }

    public function rentalDriver(): BelongsTo
    {
        return $this->belongsTo(Driver::class, 'driver_id');
    }
}
