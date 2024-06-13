<?php
namespace Database\Seeders;
use App\Models\Role;
use Illuminate\Database\Seeder;
use App\User;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::firstOrCreate([
            'email' => 'diskominfotikbna@gmail.com',
        ], [
            'name' => 'Super',
            'last_name' => 'Admin',
            'password' => bcrypt('P4ssw0rd!@')
        ]);
        $user->assignRole(Role::SUPER_ADMIN);

        $user = User::firstOrCreate([
            'email' => 'admin@admin.com',
        ], [
            'name' => 'Admin',
            'last_name' => '',
            'password' => bcrypt('P4ssw0rd!@')
        ]);
        $user->assignRole(Role::ADMIN);
    }
}
