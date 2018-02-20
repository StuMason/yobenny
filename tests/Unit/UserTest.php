<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;
use App\Models\Role;
use Symfony\Component\HttpKernel\Exception\HttpException;

class UserTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testUserRolesFunctions()
    {
        $this->expectException(HttpException::class);

        $adminRole = factory(Role::class)->create([
            "name" => Role::ADMIN
        ]);

        $adminUser = factory(User::class)->create([
            'name' => 'admin',
            'email' => 'steve@admin.user',
            'password'=> bcrypt('secret')
        ]);

        $adminUser->roles()->attach($adminRole);

        $user = factory(User::class)->create([
            'name' => 'user',
            'email' => 'steve@user.user',
            'password'=> bcrypt('secret')
        ]);

        $this->assertFalse($user->hasAnyRole([Role::ADMIN]));
        $this->assertTrue($adminUser->hasAnyRole([Role::ADMIN]));

        $this->assertFalse($user->hasRole(Role::ADMIN));
        $this->assertTrue($adminUser->hasRole(Role::ADMIN));

        $user->authorizeRoles(Role::ADMIN);
    }
}
