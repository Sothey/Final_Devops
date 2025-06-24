<?php

namespace App\Providers;

use App\Models\Booking;
use App\Models\Favorite;
use App\Models\Payment;
use App\Models\Review;
use App\Models\Terrain;
use App\Models\TerrainImage;

use App\Policies\BookingPolicy;
use App\Policies\FavoritePolicy;
use App\Policies\PaymentPolicy;
use App\Policies\ReviewPolicy;
use App\Policies\TerrainImagePolicy;
use App\Policies\TerrainPolicy;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        Terrain::class       => TerrainPolicy::class,
        TerrainImage::class  => TerrainImagePolicy::class,
        Booking::class       => BookingPolicy::class,
        Payment::class       => PaymentPolicy::class,
        Review::class        => ReviewPolicy::class,
        Favorite::class      => FavoritePolicy::class,
    ];

    public function boot(): void
    {
        // Register any authentication / authorization services here
    }
}
