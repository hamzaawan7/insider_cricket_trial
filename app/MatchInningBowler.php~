<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $inning_id
 * @property int $bowler_id
 * @property float $overs
 * @property int $maiden
 * @property int $runs
 * @property int $wickets
 * @property float $economy
 * @property int $0s
 * @property int $4s
 * @property int $6s
 * @property int $wides
 * @property int $no_balls
 * @property string $created_at
 * @property string $updated_at
 * @property Player $player
 * @property MatchInning $matchInning
 */
class MatchInningBowler extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['inning_id', 'bowler_id', 'overs', 'maiden', 'runs', 'wickets', 'economy', '0s', '4s', '6s', 'wides', 'no_balls', 'created_at', 'updated_at'];

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
}
