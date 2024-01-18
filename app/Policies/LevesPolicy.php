<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Leves;
use Illuminate\Auth\Access\HandlesAuthorization;

class LevesPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the leves can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the leves can view the model.
     */
    public function view(User $user, Leves $model): bool
    {
        return true;
    }

    /**
     * Determine whether the leves can create models.
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the leves can update the model.
     */
    public function update(User $user, Leves $model): bool
    {
        return true;
    }

    /**
     * Determine whether the leves can delete the model.
     */
    public function delete(User $user, Leves $model): bool
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
     * Determine whether the leves can restore the model.
     */
    public function restore(User $user, Leves $model): bool
    {
        return false;
    }

    /**
     * Determine whether the leves can permanently delete the model.
     */
    public function forceDelete(User $user, Leves $model): bool
    {
        return false;
    }
}
