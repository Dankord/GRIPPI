<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CrimeCategory extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'description',
    ];

    public function crimes(): HasMany
    {
        return $this->hasMany(Crime::class);
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
