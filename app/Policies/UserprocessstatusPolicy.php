<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Userprocessstatus;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserprocessstatusPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the userprocessstatus can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the userprocessstatus can view the model.
     */
    public function view(User $user, Userprocessstatus $model): bool
    {
        return true;
    }

    /**
     * Determine whether the userprocessstatus can create models.
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the userprocessstatus can update the model.
     */
    public function update(User $user, Userprocessstatus $model): bool
    {
        return true;
    }

    /**
     * Determine whether the userprocessstatus can delete the model.
     */
    public function delete(User $user, Userprocessstatus $model): bool
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
     * Determine whether the userprocessstatus can restore the model.
     */
    public function restore(User $user, Userprocessstatus $model): bool
    {
        return false;
    }

    /**
     * Determine whether the userprocessstatus can permanently delete the model.
     */
    public function forceDelete(User $user, Userprocessstatus $model): bool
    {
        return false;
    }
}
