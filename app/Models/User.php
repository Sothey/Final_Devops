<?php

namespace App\Models;

// ...

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    // ...

    public function ownedTerrains()
    {
        return $this->hasMany(Terrain::class, 'owner_id');
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class, 'renter_id');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }
}
