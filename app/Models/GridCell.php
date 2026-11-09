<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class GridCell extends Model
{
    protected $fillable = [
        'station_id',
        'cell_code',
        'geometry',
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
}
