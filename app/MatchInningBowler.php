<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $inning_id
 * @property int $bowler_id
 * @property boolean $is_bowling
 * @property float $overs
 * @property int $maiden
 * @property int $runs
 * @property int $wickets
 * @property float $economy
 * @property int $zeros
 * @property int $fours
 * @property int $sixes
 * @property int $wides
 * @property int $no_balls
 * @property boolean $has_bowled_previous_over
 * @property string $created_at
 * @property string $updated_at
 * @property Player $bowler
 * @property MatchInning $matchInning
 * @property MatchInning[] $matchInnings
 */
class MatchInningBowler extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['inning_id', 'bowler_id', 'is_bowling', 'overs', 'maiden', 'runs', 'wickets', 'economy', 'zeros', 'fours', 'sixes', 'wides', 'no_balls', 'has_bowled_previous_over', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function bowler()
    {
        return $this->belongsTo('App\Player', 'bowler_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function matchInning()
    {
        return $this->belongsTo('App\MatchInning', 'inning_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function matchInnings()
    {
        return $this->hasMany('App\MatchInning', 'current_bowling_bowler_id');
    }
}
