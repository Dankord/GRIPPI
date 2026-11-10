<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Contracts\Auth\MustVerifyEmail;

#[Fillable(['name', 'email', 'password'])]
#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable implements MustVerifyEmail
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable, SoftDeletes;

    public const ROLE_ADMIN = 'admin';
    public const ROLE_SUB_ENCODER = 'sub_encoder';
    public const ROLE_MAIN_ENCODER = 'main_encoder';
    public const ROLE_OFFICER = 'officer';

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function station(): BelongsTo
    {
        return $this->belongsTo(Station::class)
            ->withTrashed();
    }

    public function reportedCrimes(): HasMany
    {
        return $this->hasMany(Crime::class, 'reported_by_id');
    }

    public function isAdmin(): bool
    {
        return $this->role === self::ROLE_ADMIN;
    }
    public function isSubEncoder(): bool
    {
        return $this->role === self::ROLE_SUB_ENCODER;
    }

    public function isMainEncoder(): bool
    {
        return $this->role === self::ROLE_MAIN_ENCODER;
    }

    public function isOfficer(): bool
    {
        return $this->role === self::ROLE_OFFICER;
    }

    public function canAccess(): bool
    {
        return $this->exists
            && $this->deleted_at === null
            && in_array($this->role, [
                self::ROLE_ADMIN,
                self::ROLE_SUB_ENCODER,
                self::ROLE_MAIN_ENCODER,
                self::ROLE_OFFICER
            ], true);
    }
}
