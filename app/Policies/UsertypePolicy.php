<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Usertype;
use Illuminate\Auth\Access\HandlesAuthorization;

class UsertypePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the usertype can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the usertype can view the model.
     */
    public function view(User $user, Usertype $model): bool
    {
        return true;
    }

    /**
     * Determine whether the usertype can create models.
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the usertype can update the model.
     */
    public function update(User $user, Usertype $model): bool
    {
        return true;
    }

    /**
     * Determine whether the usertype can delete the model.
     */
    public function delete(User $user, Usertype $model): bool
    {
        return true;
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     */
    public function deleteAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the usertype can restore the model.
     */
    public function restore(User $user, Usertype $model): bool
    {
        return false;
    }

    /**
     * Determine whether the usertype can permanently delete the model.
     */
    public function forceDelete(User $user, Usertype $model): bool
    {
        return false;
    }
}
