<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class GridCell extends Model
{
    protected $fillable = [
        'station_id',
        'cell_code',
        'area_sq_km'
    ];

    protected function casts(): array
    {
        return [
            'area_sq_km' => 'decimal:4'
        ];
    }

    public function station(): BelongsTo
    {
        return $this->belongsTo(Station::class);
    }
    public function crimeCellAggregates(): HasMany
    {
        return $this->hasMany(CrimeCellAggregate::class);
    }
    public function crimeTemporalAggregates(): HasMany
    {
        return $this->hasMany(CrimeTemporalAggregate::class);
    }
}
