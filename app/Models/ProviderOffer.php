<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ProviderOffer extends Model
{
    protected $table = 'provider_offers';
    use HasUlids;



    public function provider(): BelongsTo
    {
        return $this->belongsTo(Provider::class);
    }


    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class);
    }

    public function workHours(): HasMany
    {
        return $this->hasMany(WorkingHour::class);
    }

    /**
     * Get all of the bookings for the ProviderOffer
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function bookings(): HasMany
    {
        return $this->hasMany(Booking::class);
    }
}
