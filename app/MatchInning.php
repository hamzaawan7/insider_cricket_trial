<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $match_id
 * @property int $batting_team_id
 * @property int $fielding_team_id
 * @property int $number
 * @property int $runs
 * @property int $wickets
 * @property float $overs
 * @property float $run_rate
 * @property int $extras
 * @property boolean $is_completed
 * @property string $created_at
 * @property string $updated_at
 * @property Team $team
 * @property Team $team
 * @property Match $match
 * @property MatchInningBatsman[] $matchInningBatsmens
 * @property MatchInningBowler[] $matchInningBowlers
 * @property MatchInningExtra[] $matchInningExtras
 * @property MatchInningFow[] $matchInningFows
 * @property MatchInningPartnership[] $matchInningPartnerships
 */
class MatchInning extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['match_id', 'batting_team_id', 'fielding_team_id', 'number', 'runs', 'wickets', 'overs', 'run_rate', 'extras', 'is_completed', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function team()
    {
        return $this->belongsTo('App\Team', 'batting_team_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function team()
    {
        return $this->belongsTo('App\Team', 'fielding_team_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function match()
    {
        return $this->belongsTo('App\Match');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function matchInningBatsmens()
    {
        return $this->hasMany('App\MatchInningBatsman', 'inning_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function matchInningBowlers()
    {
        return $this->hasMany('App\MatchInningBowler', 'inning_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function matchInningExtras()
    {
        return $this->hasMany('App\MatchInningExtra', 'inning_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function matchInningFows()
    {
        return $this->hasMany('App\MatchInningFow', 'inning_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function matchInningPartnerships()
    {
        return $this->hasMany('App\MatchInningPartnership', 'inning_id');
    }
}
