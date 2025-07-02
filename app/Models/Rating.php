<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Rating extends Model
{
    use HasFactory;

    /**
     * @var array
     */
    protected $fillable = [
        'user_id',
        'turbine_id',
        'component_id',
        'rating',
        'inspected_at',
    ];

    /**
     * @var array
     */
    protected $casts = [
        'inspected_at' => 'datetime',  // Automatically cast to Carbon instance
    ];

    /**
     * Get the user who gave this rating.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the trubine this rating belongs to.
     */
    public function trubine(): BelongsTo
    {
        return $this->belongsTo(Turbine::class);
    }

    /**
     * Get the component this rating belongs to.
     */
    public function component(): BelongsTo
    {
        return $this->belongsTo(Component::class);
    }
}