<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Trainings;
use Illuminate\Auth\Access\HandlesAuthorization;

class TrainingsPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the trainings can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the trainings can view the model.
     */
    public function view(User $user, Trainings $model): bool
    {
        return true;
    }

    /**
     * Determine whether the trainings can create models.
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the trainings can update the model.
     */
    public function update(User $user, Trainings $model): bool
    {
        return true;
    }

    /**
     * Determine whether the trainings can delete the model.
     */
    public function delete(User $user, Trainings $model): bool
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
     * Determine whether the trainings can restore the model.
     */
    public function restore(User $user, Trainings $model): bool
    {
        return false;
    }

    /**
     * Determine whether the trainings can permanently delete the model.
     */
    public function forceDelete(User $user, Trainings $model): bool
    {
        return false;
    }
}
