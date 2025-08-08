<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Goal extends Model
{
    protected $fillable = [
        'player_id',
        'matche_team_id',
        'minutes',
        'secondes',
    ];

    public function matcheTeam(): BelongsTo
    {
        return $this->belongsTo(MatcheTeam::class);
    }

    public function player(): BelongsTo
    {
        return $this->belongsTo(Player::class);
    }

    public function team()
    {
        return $this->matcheTeam->team();
    }

    public function matche()
    {
        return $this->matcheTeam->matche();
    }
}
