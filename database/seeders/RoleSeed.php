<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\Models\Role as RoleModel;
use App\Models\Permission;

class RoleSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::firstOrCreate(['name' => RoleModel::SUPER_ADMIN]);
        $role->givePermissionTo(Permission::defaultPermissionsSuperAdmin());

        $role = Role::firstOrCreate(['name' => RoleModel::ADMIN]);
        $role->givePermissionTo(Permission::defaultPermissionsAdmin());

    }
}
