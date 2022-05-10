<?php

namespace MakeIT\UserRoles;

use App\Models\User;
use Illuminate\Auth\Events\Registered;

class UserAddDefaultRoleListener
{

    protected $user;

    /**
     * Create the event listener.
     * User $user
     * @return void
     */
    public function __construct( User $user )
    {
        $this->user = $user;
    }

    /**
     * Handle the event.
     * @param \Illuminate\Auth\Events\Registered $event
     * @return void
     */
    public function handle( Registered $event ): void
    {
        $default_role = config( 'user_roles.default_role' );

        \Log::info($event);

        if ( $event->user instanceof User && !$event->user->hasRole( [ $default_role ] ) )
        {
        }
    }
}
