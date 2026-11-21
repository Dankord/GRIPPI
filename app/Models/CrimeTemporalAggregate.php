<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CrimeTemporalAggregate extends Model
{
    protected $fillable = [
        'station_id',
        'grid_cell_id',
        'crime_category_id',
        'period_start',
        'period_end',
        'day',
        'time_slot_start',
        'time_slot_end',
        'incident_count'
    ];

    protected function casts(): array
    {
        return [
            'period_start' => 'datetime',
            'period_end' => 'datetime',
            'day' => 'integer',
            'incident_count' => 'integer'
        ];
    }
    public function station(): BelongsTo
    {
        return $this->belongsTo(Station::class);
    }
    public function gridCell(): BelongsTo
    {
        return $this->belongsTo(GridCell::class);
    }
    public function crimeCategory(): BelongsTo
    {
        return $this->belongsTo(CrimeCategory::class);
    }
}
