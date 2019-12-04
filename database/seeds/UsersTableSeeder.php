<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::truncate();
        User::truncate();

        $adminRole = Role::create(['name' => 'Admin']);
        $userRole = Role::create(['name' => 'User']);

        $admin = new User;
        $admin->name = 'Antonio';
        $admin->email = 'lux.req@gmail.com';
        $admin->password = bcrypt('123');
        $admin->save();

        $admin -> assignRole($adminRole);

        $user = new User;
        $user->name = 'Carlos';
        $user->email = 'carlos@gmail.com';
        $user->password = bcrypt('123');
        $user->save();

        $user -> assignRole($userRole);
    }
}
