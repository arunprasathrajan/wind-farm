<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

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
}