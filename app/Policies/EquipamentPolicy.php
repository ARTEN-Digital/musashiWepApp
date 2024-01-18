<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Equipament;
use Illuminate\Auth\Access\HandlesAuthorization;

class EquipamentPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the equipament can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the equipament can view the model.
     */
    public function view(User $user, Equipament $model): bool
    {
        return true;
    }

    /**
     * Determine whether the equipament can create models.
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the equipament can update the model.
     */
    public function update(User $user, Equipament $model): bool
    {
        return true;
    }

    /**
     * Determine whether the equipament can delete the model.
     */
    public function delete(User $user, Equipament $model): bool
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
     * Determine whether the equipament can restore the model.
     */
    public function restore(User $user, Equipament $model): bool
    {
        return false;
    }

    /**
     * Determine whether the equipament can permanently delete the model.
     */
    public function forceDelete(User $user, Equipament $model): bool
    {
        return false;
    }
}
