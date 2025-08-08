<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Player extends Model
{
    //
        protected $fillable = [
        
        'team_id',
        'name',
        'age',
        'size',
        'speed',
        'country',
        'photo',
    ];

    public function team() : BelongsTo
    {
        return $this->belongsTo(Team::class);
    }

    public function goals() : HasMany
    {
        return $this->hasMany(Goal::class);
    }

}
