<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $match_id
 * @property int $batting_team_id
 * @property int $fielding_team_id
 * @property int $current_onstrike_batsman_id
 * @property int $current_nonstrike_batsman_id
 * @property int $current_bowling_bowler_id
 * @property int $current_extra_record_id
 * @property int $current_partnership_id
 * @property int $number
 * @property int $runs
 * @property int $wickets
 * @property float $overs
 * @property float $run_rate
 * @property float $bowling_rate
 * @property int $extras
 * @property int $target
 * @property int $last_batting_order
 * @property boolean $is_completed
 * @property string $created_at
 * @property string $updated_at
 * @property Team $battingTeam
 * @property MatchInningBowler $currentBowlingBowler
 * @property MatchInningBatsman $currentOnstrikeBatsman
 * @property MatchInningBatsman $currentNonstrikeBatsman
 * @property MatchInningPartnership $currentPartnership
 * @property MatchInningExtra $currentExtraRecord
 * @property Team $fieldingTeam
 * @property Match $match
 * @property MatchInningBatsman[] $matchInningBatsmens
 * @property MatchInningBowler[] $matchInningBowlers
 * @property MatchInningExtra[] $matchInningExtras
 * @property MatchInningFow[] $matchInningFows
 * @property MatchInningPartnership[] $matchInningPartnerships
 * @property Match[] $matches
 */
class MatchInning extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['match_id', 'batting_team_id', 'fielding_team_id', 'current_onstrike_batsman_id', 'current_nonstrike_batsman_id', 'current_bowling_bowler_id', 'current_extra_record_id', 'current_partnership_id', 'number', 'runs', 'wickets', 'overs', 'run_rate', 'bowling_rate', 'extras', 'target', 'last_batting_order', 'is_completed', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function battingTeam()
    {
        return $this->belongsTo('App\Team', 'batting_team_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function currentBowlingBowler()
    {
        return $this->belongsTo('App\MatchInningBowler', 'current_bowling_bowler_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function currentOnstrikeBatsman()
    {
        return $this->belongsTo('App\MatchInningBatsman', 'current_onstrike_batsman_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function currentNonstrikeBatsman()
    {
        return $this->belongsTo('App\MatchInningBatsman', 'current_nonstrike_batsman_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function currentExtraRecord()
    {
        return $this->belongsTo('App\MatchInningExtra', 'current_extra_record_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function currentPartnership()
    {
        return $this->belongsTo('App\MatchInningPartnership', 'current_partnership_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function fieldingTeam()
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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function matches()
    {
        return $this->hasMany('App\Match', 'current_innings_id');
    }
}
