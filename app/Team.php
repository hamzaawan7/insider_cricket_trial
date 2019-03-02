<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $tournament_id
 * @property int $team_category_id
 * @property int $country_id
 * @property string $logo
 * @property string $name
 * @property string $abbreviation
 * @property string $created_at
 * @property string $updated_at
 * @property Country $country
 * @property Category $category
 * @property Tournament $tournament
 * @property MatchInning[] $battingTeam
 * @property MatchInning[] $fieldingTeam
 * @property Match[] $team1
 * @property Match[] $team2
 * @property Match[] $tossWinner
 * @property Player[] $players
 */
class Team extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['tournament_id', 'team_category_id', 'country_id', 'logo', 'name', 'abbreviation', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function country()
    {
        return $this->belongsTo('App\Country');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo('App\Category', 'team_category_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tournament()
    {
        return $this->belongsTo('App\Tournament');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function battingTeam()
    {
        return $this->hasMany('App\MatchInning', 'batting_team_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function fieldingTeam()
    {
        return $this->hasMany('App\MatchInning', 'fielding_team_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function team1()
    {
        return $this->hasMany('App\Match', 'team1_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function team2()
    {
        return $this->hasMany('App\Match', 'team2_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tossWinner()
    {
        return $this->hasMany('App\Match', 'toss_winner_team_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function players()
    {
        return $this->hasMany('App\Player');
    }
}
