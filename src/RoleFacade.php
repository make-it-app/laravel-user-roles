<?php

namespace MakeIT\UserRoles;

use Illuminate\Support\Facades\Facade;

class RoleFacade extends Facade
{
    public static function getFacadeAccessor()
    {
        return 'role';
    }
}
