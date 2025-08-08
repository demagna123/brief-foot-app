<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Team extends Model
{

        protected $fillable = [
        'name',
        'year_creation',
        'photo',
    ];

    public function goals(): HasMany
{
    return $this->hasMany(Goal::class);
}
    public function players(): HasMany
    {
        return $this->hasMany(Player::class);
    }
}
