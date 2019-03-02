<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $team_id
 * @property int $rank
 * @property int $matches_played
 * @property int $won
 * @property int $lost
 * @property int $points
 * @property string $created_at
 * @property string $updated_at
 * @property Team $team
 */
class Standing extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['team_id', 'rank', 'matches_played', 'won', 'lost', 'points', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function team()
    {
        return $this->belongsTo('App\Team');
    }
}
