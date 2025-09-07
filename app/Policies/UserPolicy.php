<?php

namespace App\Policies;

use App\Models\Lookups\UsersLookup;
use App\Models\User;

class UserPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, User $model): bool
    {
        //
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, User $model): bool
    {
        // cannot update system account
        if ($user->id == UsersLookup::SYSTEMACCOUNT) {
            return false;
        }
        // can edit self
        if ($user->id === $model->id) {
            return true;
        }
        // admin and super user can edit anyone
        if ($user->isAdmin() || $user->isSuperUser()) {
            return true;
        }

        return false;
    }

    public function updateUsername(User $user, User $model): bool
    {
        // cannot update system account
        if ($model->id == UsersLookup::SYSTEMACCOUNT) {
            return false;
        }

        return $user->isAdmin() || $user->isSuperUser();
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, User $model): bool
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, User $model): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, User $model): bool
    {
        //
    }
}
