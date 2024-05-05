<?php

namespace App\Policies;

use App\Models\Owner;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class UserPolicy
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
    public function view(User $user, Owner $owner): bool
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->type==1 || $user->type==2 || $user->type==3;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Owner $owner): bool
    {
        return $user->type==1 || $user->type==2 || $user->type==3;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Owner $owner): bool
    {
        return $user->type==2 || $user->type==3;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Owner $owner): bool
    {
        return $user->type==2 || $user->type==3;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Owner $owner): bool
    {
        return $user->type==2 || $user->type==3;
    }
}
