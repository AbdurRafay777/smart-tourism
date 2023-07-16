<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Vendor extends Model
{
    use HasFactory;

    protected $guarded=[];

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function trips():HasMany
    {
        return $this->hasMany(Trips::class);
    }
}
