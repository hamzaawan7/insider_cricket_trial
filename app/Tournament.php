<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $tournament_category_id
 * @property int $country_id
 * @property string $logo
 * @property string $name
 * @property string $abbreviation
 * @property string $created_at
 * @property string $updated_at
 * @property Country $country
 * @property Category $category
 * @property Match[] $matches
 * @property Team[] $teams
 */
class Tournament extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['tournament_category_id', 'country_id', 'logo', 'name', 'abbreviation', 'created_at', 'updated_at'];

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
        return $this->belongsTo('App\Category', 'tournament_category_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function matches()
    {
        return $this->hasMany('App\Match');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function teams()
    {
        return $this->hasMany('App\Team');
    }
}
