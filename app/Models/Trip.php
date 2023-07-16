<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Trip extends Model
{
    use HasFactory;

    protected $guarded=[];

    public function users():BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }

    public function departure_city():BelongsTo
    {
        return $this->belongsTo(City::class, 'departure');
    }

    public function destination_city():BelongsTo
    {
        return $this->belongsTo(City::class, 'destination');
    }

    public function vehicle():HasOne
    {
        return $this->hasOne(Vehicle::class);
    }

}
