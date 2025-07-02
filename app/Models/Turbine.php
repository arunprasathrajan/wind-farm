<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Turbine extends Model
{
    use HasFactory;

    /**
     * @var array
     */
    protected $fillable = [
        'name',
    ];

    /**
     * Get the components for the turbine.
     */
    public function components(): BelongsToMany
    {
        return $this->belongsToMany(Component::class, 'turbine_component');
    }

    /**
     * Get the most recent ratings for the component.
     */
    public function recentRating(): HasOne
    {
        return $this->hasOne(Rating::class, 'turbine_id')->latest('inspected_at');
    }
}