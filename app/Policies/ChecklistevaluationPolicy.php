<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Checklistevaluation;
use Illuminate\Auth\Access\HandlesAuthorization;

class ChecklistevaluationPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the checklistevaluation can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the checklistevaluation can view the model.
     */
    public function view(User $user, Checklistevaluation $model): bool
    {
        return true;
    }

    /**
     * Determine whether the checklistevaluation can create models.
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the checklistevaluation can update the model.
     */
    public function update(User $user, Checklistevaluation $model): bool
    {
        return true;
    }

    /**
     * Determine whether the checklistevaluation can delete the model.
     */
    public function delete(User $user, Checklistevaluation $model): bool
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
     * Determine whether the checklistevaluation can restore the model.
     */
    public function restore(User $user, Checklistevaluation $model): bool
    {
        return false;
    }

    /**
     * Determine whether the checklistevaluation can permanently delete the model.
     */
    public function forceDelete(User $user, Checklistevaluation $model): bool
    {
        return false;
    }
}
