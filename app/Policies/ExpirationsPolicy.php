<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Expirations;
use Illuminate\Auth\Access\HandlesAuthorization;

class ExpirationsPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the expirations can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the expirations can view the model.
     */
    public function view(User $user, Expirations $model): bool
    {
        return true;
    }

    /**
     * Determine whether the expirations can create models.
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the expirations can update the model.
     */
    public function update(User $user, Expirations $model): bool
    {
        return true;
    }

    /**
     * Determine whether the expirations can delete the model.
     */
    public function delete(User $user, Expirations $model): bool
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
     * Determine whether the expirations can restore the model.
     */
    public function restore(User $user, Expirations $model): bool
    {
        return false;
    }

    /**
     * Determine whether the expirations can permanently delete the model.
     */
    public function forceDelete(User $user, Expirations $model): bool
    {
        return false;
    }
}
