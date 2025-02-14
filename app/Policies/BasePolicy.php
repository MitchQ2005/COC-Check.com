<?php
namespace App\Policies;

use App\Models\Base;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class BasePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any bases.
     */
    public function viewAny(User $user)
    {
        return true; // Allow all users to view any base
    }

    /**
     * Determine whether the user can view the base.
     */
    public function view(User $user, Base $base)
    {
        return true; // Allow all users to view a base
    }

    /**
     * Determine whether the user can create bases.
     */
    public function create(User $user)
    {
        return true; // Allow authenticated users to create a base
    }

    /**
     * Determine whether the user can update the base.
     */
    public function update(User $user, Base $base)
    {
        return $user->id === $base->user_id; // Allow users to update their own bases
    }

    /**
     * Determine whether the user can delete the base.
     */
    public function delete(User $user, Base $base)
    {
        return $user->id === $base->user_id; // Allow users to delete their own bases
    }
}