<?php

namespace App\Models;

class Permission extends \Spatie\Permission\Models\Permission
{
    public static $rules = [
        'name'=>['required','not_regex:/(.*)\.(create|read|update|delete)$/i']
    ];
    public static function defaultPermissionsSuperAdmin(){
        return [
            'users.create',
            'users.read',
            'users.update',
            'users.delete',

            'roles.create',
            'roles.read',
            'roles.update',
            'roles.delete',

            'permissions.create',
            'permissions.read',
            'permissions.update',
            'permissions.delete',

            'configs.create',
            'configs.read',
            'configs.update',
            'configs.delete',
        ];
    }
    public static function defaultPermissionsAdmin(){
        return [
            'users.create',
            'users.read',
            'users.update',
            'users.delete',
        ];
    }
    public static function groupingPermissions($permissions){
        $table = [];
        foreach ($permissions as $permission) {
            $isBeginCrud = preg_match('/(.*)\.((?:create|read|update|delete))$/', $permission->name, $matches);
            $initRecord = ['create'=>['active'=>0, 'name'=>$permission->name], 'read'=>['active'=>0, 'name'=>$permission->name],
                            'update'=>['active'=>0, 'name'=>$permission->name], 'delete'=>['active'=>0, 'name'=>$permission->name]];
            if ($isBeginCrud){
                if (!array_key_exists($matches[1], $table))
                    $table[$matches[1]]['crud']=$initRecord;
                $table[$matches[1]]['crud'][$matches[2]]['active'] = 1;
                $table[$matches[1]]['crud'][$matches[2]]['name']=$permission->name;
                $table[$matches[1]]['isModule'] = true;
            }
            else{
                $table[$permission->name]['crud']=$initRecord;
                $table[$permission->name]['crud']['read']['active']=1;
                $table[$permission->name]['isModule'] = false;
            }
        }
        return $table;
    }
}
