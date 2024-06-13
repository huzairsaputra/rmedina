<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;
use Spatie\Permission\Models\Permission;

class PermissionSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Artisan::call('cache:clear');
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
        $permissions = \App\Models\Permission::defaultPermissionsSuperAdmin();

        foreach ($permissions as $permission){
            Permission::firstOrCreate(['name' => $permission]);
        }

    }
}
