<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Provider extends Model
{
    /** @use HasFactory<\Database\Factories\ProviderFactory> */
    use HasFactory, HasUlids;


    /**
     * Get the user that owns the Provider
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }


   

    /**
     * Get all of the serviceOffer for the Provider
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function serviceOffer(): HasMany
    {
        return $this->hasMany(ProviderOffer::class);
    }
}
