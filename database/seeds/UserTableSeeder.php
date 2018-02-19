<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminRole = Role::where('name', Role::ADMIN)->first();

        $adminUser = factory(User::class)->create([
            'name' => 'admin',
            'email' => 'admin@admin.admin',
            'password'=> bcrypt('secret')
        ]);

        $adminUser->roles()->attach($adminRole);

        $user = factory(User::class)->create([
            'name' => 'user',
            'email' => 'user@user.user',
            'password'=> bcrypt('secret')
        ]);
    }
}
