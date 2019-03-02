<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $inning_id
 * @property int $batsman_id
 * @property int $bowled_by_id
 * @property int $runs
 * @property int $balls
 * @property int $4s
 * @property int $6s
 * @property float $strike_rate
 * @property string $created_at
 * @property string $updated_at
 * @property Player $batsman
 * @property Player $bowledBy
 * @property MatchInning $matchInning
 */
class MatchInningBatsman extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['inning_id', 'batsman_id', 'bowled_by_id', 'runs', 'balls', '4s', '6s', 'strike_rate', 'created_at', 'updated_at'];

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
}
