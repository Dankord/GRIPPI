<?php

namespace App\Policies;

use App\Models\Crime;
use App\Models\User;

class CrimePolicy
{
    /**
     * View the list of crime records.
     */
    public function viewAny(User $user): bool
    {
        return in_array($user->role, [
            'officer',
            'sub_encoder',
            'main_encoder',
            'admin',
            'super_admin',
        ], true);
    }

    /**
     * View an individual crime record.
     */
    public function view(User $user, Crime $crime): bool
    {
        if ($user->role === 'super_admin') {
            return true;
        }

        return in_array($user->role, [
            'officer',
            'sub_encoder',
            'main_encoder',
            'admin',
        ], true)
        && $user->station_id !== null
        && (int) $user->station_id === (int) $crime->station_id;
    }

    /**
     * Create a crime record.
     */
    public function create(User $user): bool
    {
        return in_array($user->role, [
            'sub_encoder',
            'main_encoder',
            'admin',
            'super_admin',
        ], true);
    }

    /**
     * Update a crime record.
     */
    public function update(User $user, Crime $crime): bool
    {
        if ($user->role === 'super_admin') {
            return true;
        }

        return in_array($user->role, [
            'main_encoder',
            'admin',
        ], true)
        && $user->station_id !== null
        && (int) $user->station_id === (int) $crime->station_id;
    }

    /**
     * Delete a crime record.
     */
    public function delete(User $user, Crime $crime): bool
    {
        if ($user->role === 'super_admin') {
            return true;
        }

        return in_array($user->role, [
            'main_encoder',
            'admin',
        ], true)
        && $user->station_id !== null
        && (int) $user->station_id === (int) $crime->station_id;
    }

    /**
     * Restore a soft-deleted crime record.
     */
    public function restore(User $user, Crime $crime): bool
    {
        if ($user->role === 'super_admin') {
            return true;
        }

        return $user->role === 'admin'
            && $user->station_id !== null
            && (int) $user->station_id === (int) $crime->station_id;
    }

    /**
     * Permanently delete a crime record.
     */
    public function forceDelete(User $user, Crime $crime): bool
    {
        return $user->role === 'super_admin';
    }
}
