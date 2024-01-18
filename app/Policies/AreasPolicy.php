<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Areas;
use Illuminate\Auth\Access\HandlesAuthorization;

class AreasPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the areas can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the areas can view the model.
     */
    public function view(User $user, Areas $model): bool
    {
        return true;
    }

    /**
     * Determine whether the areas can create models.
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the areas can update the model.
     */
    public function update(User $user, Areas $model): bool
    {
        return true;
    }

    /**
     * Determine whether the areas can delete the model.
     */
    public function delete(User $user, Areas $model): bool
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
     * Determine whether the areas can restore the model.
     */
    public function restore(User $user, Areas $model): bool
    {
        return false;
    }

    /**
     * Determine whether the areas can permanently delete the model.
     */
    public function forceDelete(User $user, Areas $model): bool
    {
        return false;
    }
}
