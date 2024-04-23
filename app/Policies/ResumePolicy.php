<?php

namespace App\Policies;

use App\Models\Resume;
use App\Models\User;

class ResumePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Resume $resume): bool
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        if (isset($user->is_admin)) {
            return auth()->user()->is_admin;
        } else {
            return false;
        }
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Resume $resume): bool
    {
        if (isset($user->is_admin)) {
            return auth()->user()->is_admin;
        } else {
            return false;
        }
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Resume $resume): bool
    {
        if (isset($user->is_admin)) {
            return auth()->user()->is_admin;
        } else {
            return false;
        }
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Resume $resume): bool
    {
        if (isset($user->is_admin)) {
            return auth()->user()->is_admin;
        } else {
            return false;
        }
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Resume $resume): bool
    {
        if (isset($user->is_admin)) {
            return auth()->user()->is_admin;
        } else {
            return false;
        }
    }
}
