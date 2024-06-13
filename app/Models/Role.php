<?php

namespace App\Models;

class Role extends \Spatie\Permission\Models\Role
{
    const SUPER_ADMIN = 'SuperAdmin';
    const ADMIN = 'Admin';

    public static $rules = [
        'name'=>'required'
    ];
}
