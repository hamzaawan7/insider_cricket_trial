<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $team_id
 * @property int $birth_country_id
 * @property int $playing_role_id
 * @property int $batting_style_id
 * @property int $bowling_style_id
 * @property string $first_name
 * @property string $middle_name
 * @property string $last_name
 * @property string $short_name
 * @property string $birth_date
 * @property int $batting_order
 * @property string $created_at
 * @property string $updated_at
 * @property BattingStyle $battingStyle
 * @property Country $country
 * @property BowlingStyle $bowlingStyle
 * @property PlayerRole $playerRole
 * @property Team $team
 * @property MatchInningBatsman[] $batsman
 * @property MatchInningBatsman[] $bowledBy
 * @property MatchInningBowler[] $matchInningBowlers
 * @property MatchInningFow[] $matchInningFows
 * @property MatchInningPartnership[] $batsman1
 * @property MatchInningPartnership[] $batsman2
 */
class Player extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['team_id', 'birth_country_id', 'playing_role_id', 'batting_style_id', 'bowling_style_id', 'first_name', 'middle_name', 'last_name', 'short_name', 'birth_date', 'batting_order', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function battingStyle()
    {
        return $this->belongsTo('App\BattingStyle');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function country()
    {
        return $this->belongsTo('App\Country', 'birth_country_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function bowlingStyle()
    {
        return $this->belongsTo('App\BowlingStyle');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function playerRole()
    {
        return $this->belongsTo('App\PlayerRole', 'playing_role_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function team()
    {
        return $this->belongsTo('App\Team');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function batsman()
    {
        return $this->hasMany('App\MatchInningBatsman', 'batsman_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function bowledBy()
    {
        return $this->hasMany('App\MatchInningBatsman', 'bowled_by_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function matchInningBowlers()
    {
        return $this->hasMany('App\MatchInningBowler', 'bowler_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function matchInningFows()
    {
        return $this->hasMany('App\MatchInningFow', 'bowled_by_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function batsman1()
    {
        return $this->hasMany('App\MatchInningPartnership', 'batsman1_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function batsman2()
    {
        return $this->hasMany('App\MatchInningPartnership', 'batsman2_id');
    }
}
