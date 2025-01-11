<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class WorkingHour extends Model
{
    use HasUlids;


    /**
     * Get the providerservice that owns the WorkingHour
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function providerservice(): BelongsTo
    {
        return $this->belongsTo(ProviderOffer::class);
    }
}
