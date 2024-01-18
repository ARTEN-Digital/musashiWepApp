<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Concepts;
use Illuminate\Auth\Access\HandlesAuthorization;

class ConceptsPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the concepts can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the concepts can view the model.
     */
    public function view(User $user, Concepts $model): bool
    {
        return true;
    }

    /**
     * Determine whether the concepts can create models.
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the concepts can update the model.
     */
    public function update(User $user, Concepts $model): bool
    {
        return true;
    }

    /**
     * Determine whether the concepts can delete the model.
     */
    public function delete(User $user, Concepts $model): bool
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
     * Determine whether the concepts can restore the model.
     */
    public function restore(User $user, Concepts $model): bool
    {
        return false;
    }

    /**
     * Determine whether the concepts can permanently delete the model.
     */
    public function forceDelete(User $user, Concepts $model): bool
    {
        return false;
    }
}
