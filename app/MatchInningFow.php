<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $inning_id
 * @property int $bowled_by_id
 * @property int $number
 * @property int $runs
 * @property float $overs
 * @property string $created_at
 * @property string $updated_at
 * @property Player $player
 * @property MatchInning $matchInning
 */
class MatchInningFow extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['inning_id', 'bowled_by_id', 'number', 'runs', 'overs', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function player()
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
