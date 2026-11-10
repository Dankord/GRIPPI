<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Station extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'address',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
        ];
    }

    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }

    public function crimes(): HasMany
    {
        return $this->hasMany(Crime::class);
    }
    public function gridCells(): HasMany
    {
        return $this->hasMany(GridCell::class);
    }
    public function crimeTemporalAggregates(): HasMany
    {
        return $this->hasMany(CrimeTemporalAggregate::class);
    }
    // query only active stations
    public function scopeActive(Builder $query): Builder
    {
        return $query->where('is_active', true);
    }
}
