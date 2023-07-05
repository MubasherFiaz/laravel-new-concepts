<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Country extends Model
{
    use HasFactory;
    /**
     * Get all of the states for the Country
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function states(): HasMany
    {
        return $this->hasMany(State::class);
    }
    /**
     * Get all of the comments for the Country
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
     */
    public function stateCities(): HasManyThrough
    {
        return $this->hasManyThrough(City::class, State::class);
    }
}
