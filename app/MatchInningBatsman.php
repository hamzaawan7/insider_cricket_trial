<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $inning_id
 * @property int $batsman_id
 * @property int $bowled_by_id
 * @property boolean $is_on_strike
 * @property boolean $is_batting
 * @property boolean $has_batted
 * @property int $runs
 * @property int $balls
 * @property int $fours
 * @property int $sixes
 * @property float $strike_rate
 * @property string $created_at
 * @property string $updated_at
 * @property Player $batsman
 * @property Player $bowledBy
 * @property MatchInning $matchInning
 * @property MatchInning[] $matchInnings
 * @property MatchInning[] $matchInnings2
 */
class MatchInningBatsman extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['inning_id', 'batsman_id', 'bowled_by_id', 'is_on_strike', 'is_batting', 'has_batted', 'runs', 'balls', 'fours', 'sixes', 'strike_rate', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function batsman()
    {
        return $this->belongsTo('App\Player', 'batsman_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function bowledBy()
    {
        return $this->belongsTo('App\Player', 'bowled_by_id');
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
        return $this->hasMany('App\MatchInning', 'current_onstrike_batsman_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function matchInnings2()
    {
        return $this->hasMany('App\MatchInning', 'current_nonstrike_batsman_id');
    }
}
