<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $inning_id
 * @property int $batsman1_id
 * @property int $batsman2_id
 * @property int $runs_contribution
 * @property int $balls_faced
 * @property int $strike_rate
 * @property string $created_at
 * @property string $updated_at
 * @property Player $player
 * @property Player $player
 * @property MatchInning $matchInning
 */
class MatchInningPartnership extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['inning_id', 'batsman1_id', 'batsman2_id', 'runs_contribution', 'balls_faced', 'strike_rate', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function player()
    {
        return $this->belongsTo('App\Player', 'batsman1_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function player()
    {
        return $this->belongsTo('App\Player', 'batsman2_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function matchInning()
    {
        return $this->belongsTo('App\MatchInning', 'inning_id');
    }
}
