<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $inning_id
 * @property int $wides
 * @property int $no_balls
 * @property int $total
 * @property string $created_at
 * @property string $updated_at
 * @property MatchInning $matchInning
 */
class MatchInningExtra extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['inning_id', 'wides', 'no_balls', 'total', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function matchInning()
    {
        return $this->belongsTo('App\MatchInning', 'inning_id');
    }
}
