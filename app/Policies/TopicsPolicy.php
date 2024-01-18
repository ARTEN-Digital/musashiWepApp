<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Topics;
use Illuminate\Auth\Access\HandlesAuthorization;

class TopicsPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the topics can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the topics can view the model.
     */
    public function view(User $user, Topics $model): bool
    {
        return true;
    }

    /**
     * Determine whether the topics can create models.
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the topics can update the model.
     */
    public function update(User $user, Topics $model): bool
    {
        return true;
    }

    /**
     * Determine whether the topics can delete the model.
     */
    public function delete(User $user, Topics $model): bool
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
     * Determine whether the topics can restore the model.
     */
    public function restore(User $user, Topics $model): bool
    {
        return false;
    }

    /**
     * Determine whether the topics can permanently delete the model.
     */
    public function forceDelete(User $user, Topics $model): bool
    {
        return false;
    }
}
