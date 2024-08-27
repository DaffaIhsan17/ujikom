<?php
namespace App\Policies;

use App\Models\User;

class UserPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasRole(['Admin']);
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user): bool
    {
        // Example: Allow if the user is an Admin or the owner of the model
        return $user->hasRole(['Admin']) || $user->id === $model->id;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        // Example: Allow only Admins to create
        return $user->hasRole('Admin');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, User $model): bool
    {
        // Example: Allow update if user is Admin or the owner of the model
        return $user->hasRole('Admin') || $user->id === $model->id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, User $model): bool
    {
        // Example: Allow delete if user is Admin or the owner of the model
        return $user->hasRole('Admin') || $user->id === $model->id;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, User $model): bool
    {
        // Example: Allow restore if user is Admin
        return $user->hasRole('Admin');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, User $model): bool
    {
        // Example: Allow force delete if user is Admin
        return $user->hasRole('Admin');
    }
}
