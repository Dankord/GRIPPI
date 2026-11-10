<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CrimeCellAggregate extends Model
{
    protected $fillable = [
        'grid_cell_id',
        'crime_category_id',
        'period_start',
        'period_end',
        'incident_count',
        'high_severity_count',
    ];

    protected function casts(): array {
        return [
            'period_start' => 'datetime',
            'period_end' => 'datetime',
            'incident_count' => 'integer',
            'high_severity_count' => 'integer'
        ];
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
