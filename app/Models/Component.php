<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Component extends Model
{
    use HasFactory;

    /**
     * @var array
     */
    protected $fillable = [
        'name',
    ];

    /**
     * Get the turbines for the components.
     */
    public function trubines(): BelongsToMany
    {
        return $this->belongsToMany(Turbine::class, 'turbine_component');
    }

    /**
     * Get the ratings for the components.
     */
    public function ratings(): HasMany
    {   
        return $this->hasMany(Rating::class, 'component_id');
    }

    /**
     * Get the most recent ratings for the component.
     */
    public function recentRating(): HasOne
    {
        return $this->hasOne(Rating::class, 'component_id')->latest('inspected_at');
    }
}
