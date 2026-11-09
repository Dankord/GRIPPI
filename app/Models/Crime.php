<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Carbon\Carbon;

class Crime extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'crime_category_id',
        'station_id',
        'reported_by_id',
        'severity',
        'description',
        'occurred_at',
        'reported_at',
        'address',
        'location',
    ];

    protected function casts(): array
    {
        return [
            'occurred_at' => 'datetime',
            'reported_at' => 'datetime',
        ];
    }

    public function crimeCategory(): BelongsTo
    {
        return $this->belongsTo(CrimeCategory::class, 'crime_category_id')->withTrashed();
    }

    public function station(): BelongsTo
    {
        return $this->belongsTo(Station::class);
    }

    public function reportedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'reported_by_id');
    }

    public function scopeOccuredBetween(Builder $query, Carbon $start, Carbon $end): Builder
    {
        return $query->whereBetween(
            'occurred_at',
            [$start, $end]
        );
    }
}
