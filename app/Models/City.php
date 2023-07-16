<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class City extends Model
{
    use HasFactory;

    protected $guarded=[];

    public function users():BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }

    public function departure():BelongsTo
    {
        return $this->belongsTo(Trip::class, 'departure');
    }

    public function destination():BelongsTo
    {
        return $this->belongsTo(Trip::class, 'destination');
    }


}
