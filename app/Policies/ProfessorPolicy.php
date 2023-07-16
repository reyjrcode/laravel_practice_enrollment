<?php

namespace App\Policies;

use App\Models\Professor;
use App\Models\User;


class ProfessorPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    // public function viewAny(User $user): bool
    // {
    //     //
    // }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Professor $professor): bool
    {
        if ($user->id === $professor->creator_id) {
            return true;
        }

        if ($user->memberships->contains($professor)) {
            return true;
        }

        return false;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Professor $professor): bool
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Professor $professor): bool
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Professor $professor): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Professor $professor): bool
    {
        //php artisan make:policy ProfessorPolicy --model=Professor
    }
}