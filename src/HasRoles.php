<?php

namespace MakeIT\UserRoles;

use MakeIT\UserRoles\Role;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

trait HasRoles
{
    /**
     * @param string $role
     * @return Model|null
     */
    public function assignRole( string $role ): ?Model
    {
        $Role = ( new Role )->where( 'name', 'ILIKE', $role )->first();
        if ( !is_null( $Role ) )
        {
            return $this->roles()->save( $Role );
        }
        return null;
    }

    /**
     * @return BelongsToMany
     */
    public function roles(): BelongsToMany
    {
        return $this->belongsToMany( Role::class );
    }

    /**
     * @param mixed $role
     * @return boolean
     */
    public function hasRole( mixed $role ): bool
    {
        if ( is_array( $role ) )
        {
            if ( $this->roles->count() )
            {
                foreach ( $this->roles as $r )
                {
                    if (in_array($r->name, $role))
                    {
                        return true;
                    }
                }
            }
        }
        else
        {
            if ( $this->roles->count() )
            {
                return $this->roles->contains( 'name', $role );
            }
        }
        return false;
    }
}
