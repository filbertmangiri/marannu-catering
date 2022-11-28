<?php

namespace App\Policies;

use App\Enums\Role;
use App\Models\Foodstuff;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class FoodstuffPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        return $user->can('atleast_role', Role::Moderator);
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Foodstuff  $foodstuff
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Foodstuff $foodstuff)
    {
        return $user->can('atleast_role', Role::Moderator);
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->can('atleast_role', Role::Moderator);
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Foodstuff  $foodstuff
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Foodstuff $foodstuff)
    {
        return $user->can('atleast_role', Role::Moderator);
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Foodstuff  $foodstuff
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Foodstuff $foodstuff)
    {
        return $user->can('atleast_role', Role::Moderator);
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Foodstuff  $foodstuff
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Foodstuff $foodstuff)
    {
        return $user->can('atleast_role', Role::Moderator);
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Foodstuff  $foodstuff
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Foodstuff $foodstuff)
    {
        return $user->can('atleast_role', Role::Moderator);
    }
}
