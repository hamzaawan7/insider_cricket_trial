<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $tournament_id
 * @property int $team1_id
 * @property int $team2_id
 * @property int $venue_id
 * @property int $toss_winner_team_id
 * @property int $winner_team_id
 * @property int $match_status_id
 * @property int $current_innings_id
 * @property string $title
 * @property string $datetime_start
 * @property string $created_at
 * @property string $updated_at
 * @property MatchInning $currentInning
 * @property MatchStatus $matchStatus
 * @property Team $team1
 * @property Team $team2
 * @property Team $tossWinnerTeam
 * @property Tournament $tournament
 * @property Venue $venue
 * @property Team $winnerTeam
 * @property MatchInning[] $matchInnings
 */
class Match extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['tournament_id', 'team1_id', 'team2_id', 'venue_id', 'toss_winner_team_id', 'winner_team_id', 'match_status_id', 'current_innings_id', 'title', 'datetime_start', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function currentInning()
    {
        return $this->belongsTo('App\MatchInning', 'current_innings_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function matchStatus()
    {
        return $this->belongsTo('App\MatchStatus');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function team1()
    {
        return $this->belongsTo('App\Team', 'team1_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function team2()
    {
        return $this->belongsTo('App\Team', 'team2_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tossWinnerTeam()
    {
        return $this->belongsTo('App\Team', 'toss_winner_team_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tournament()
    {
        return $this->belongsTo('App\Tournament');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function venue()
    {
        return $this->belongsTo('App\Venue');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function winnerTeam()
    {
        return $this->belongsTo('App\Team', 'winner_team_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function matchInnings()
    {
        return $this->hasMany('App\MatchInning');
    }
}
