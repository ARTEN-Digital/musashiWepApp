<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Activities;
use Illuminate\Auth\Access\HandlesAuthorization;

class ActivitiesPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the activities can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the activities can view the model.
     */
    public function view(User $user, Activities $model): bool
    {
        return true;
    }

    /**
     * Determine whether the activities can create models.
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the activities can update the model.
     */
    public function update(User $user, Activities $model): bool
    {
        return true;
    }

    /**
     * Determine whether the activities can delete the model.
     */
    public function delete(User $user, Activities $model): bool
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
     * Determine whether the activities can restore the model.
     */
    public function restore(User $user, Activities $model): bool
    {
        return false;
    }

    /**
     * Determine whether the activities can permanently delete the model.
     */
    public function forceDelete(User $user, Activities $model): bool
    {
        return false;
    }
}
