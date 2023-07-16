<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Vehicle extends Model
{
    use HasFactory;

    protected $guarded=[];

    public function rental_service():BelongsTo
    {
        return $this->belongsTo(User::class);
    }


    public function vendors():BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }

    public function types():BelongsToMany
    {
        return $this->belongsToMany(Type::class);
    }

    public function trip():BelongsTo
    {
        return $this->belongsTo(Trip::class);
    }
}
