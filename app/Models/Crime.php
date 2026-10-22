<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Crime extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'crime_category_id',
        'station_id',
        'reported_by_id',
        'occured_at',
        'reported_at',
        'address',
        'location',
    ];

    protected function casts(): array
    {
        return [
            'occured_at' => 'datetime',
            'reported_at' => 'datetime',
        ];
    }

    public function crimeCategory(): BelongsTo
    {
        return $this->belongsTo(CrimeCategory::class);
    }

    public function station(): BelongsTo
    {
        return $this->belongsTo(Station::class);
    }

    public function reportedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'reported_by_id');
    }
}
