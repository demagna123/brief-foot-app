<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class MatcheTeam extends Model
{
      protected $fillable = [
        'team_id',
        'matche_id',
        'position',
        'score',
    ];

    public function goals() :HasMany

    {
        return $this->hasMany(Goal::class);
    }

    public function matche()
    {
        return $this->belongsTo(Matche::class);
    }

    public function team()
    {
        return $this->belongsTo(Team::class);
    }
}
