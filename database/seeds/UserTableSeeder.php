<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use App\Models\Address;

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
            'name' => 'Stu Mason',
            'email' => env('ADMIN_EMAIL'),
            'password'=> bcrypt(env('ADMIN_PASSWORD'))
        ]);

        $adminUser->roles()->attach($adminRole);

        $user = factory(User::class)->create([
            'name' => 'test_user',
            'email' => env('TEST_USER_EMAIL'),
            'password'=> bcrypt(env('TEST_USER_PASSWORD'))
        ]);

        $user->address()->save(factory(Address::class)->create());
    }
}
