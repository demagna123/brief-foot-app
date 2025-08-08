<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Matche extends Model
{
    //
       protected $fillable = [
        'date_matche',
        'status',
    ];

    public function goals(): HasMany
{
    return $this->hasMany(Goal::class);
}
public function matcheTeams() : HasMany
    {
        return $this->hasMany(MatcheTeam::class);
    }

    public function homeTeam()
    {
        return $this->matcheTeams()->where('position', 'home')->first()?->team;
    }

    public function awayTeam()
    {
        return $this->matcheTeams()->where('position', 'away')->first()?->team;
    }

    public function homeScore()
    {
        return $this->matcheTeams()->where('position', 'home')->first()?->score ?? 0;
    }

    public function awayScore()
    {
        return $this->matcheTeams()->where('position', 'away')->first()?->score ?? 0;
    }

}
