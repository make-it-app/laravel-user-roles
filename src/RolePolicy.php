<?php

namespace MakeIT\UserRoles;

use MakeIT\UserRoles\Role;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class RolePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     * @param  \App\Models\User  $user
     * @param  \MakeIT\UserRoles\Role  $role
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Role $role)
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->hasRole([ 'super', 'admin' ]);
    }

    /**
     * Determine whether the user can update the model.
     * @param  \App\Models\User  $user
     * @param  \MakeIT\UserRoles\Role  $role
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Role $role)
    {
        return $user->hasRole([ 'super', 'admin' ]);
    }

    /**
     * Determine whether the user can delete the model.
     * @param  \App\Models\User  $user
     * @param  \MakeIT\UserRoles\Role  $role
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Role $role)
    {
        return $user->hasRole([ 'super', 'admin' ]);
    }

    /**
     * Determine whether the user can restore the model.
     * @param  \App\Models\User  $user
     * @param  \MakeIT\UserRoles\Role  $role
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Role $role)
    {
        return $user->hasRole([ 'super', 'admin' ]);
    }

    /**
     * Determine whether the user can permanently delete the model.
     * @param  \App\Models\User  $user
     * @param  \MakeIT\UserRoles\Role  $role
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Role $role)
    {
        return $user->hasRole([ 'super', 'admin' ]);
    }

    /**
     * Determine whether the user can attach a User to a Role.
     * @param  \App\Models\User  $user
     * @param  \App\Models\Podcast  $podcast
     * @param  \App\Models\Tag  $tag
     * @return mixed
     */
    public function attachUser( User $user, Role $role, User $User )
    {
        return $user->hasRole([ 'super', 'admin', 'support' ]) || $role->name == 'user';
    }

    /**
     * Determine whether the user can detach a User from a Role.
     * @param  \App\Models\User  $user
     * @param  \App\Models\Podcast  $podcast
     * @param  \App\Models\Tag  $tag
     * @return mixed
     */
    public function detachUser( User $user, Role $role, User $User )
    {
        return ( $user->hasRole([ 'super', 'admin', 'support' ]) || ($role->name != 'user' && $role != 'super' ) ) ;
    }

    /**
     * Determine whether the user can attach any User to the Role.
     * @param  \App\Models\User  $user
     * @param  \App\Models\Podcast  $podcast
     * @return mixed
     */
    public function attachAnyUser( User $user, Role $role )
    {
        return $user->hasRole([ 'super', 'admin', 'support' ]) || $role->name == 'user';
    }

}
