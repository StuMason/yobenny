<?php

namespace Tests;

use Laravel\Dusk\TestCase as BaseTestCase;
use Facebook\WebDriver\Chrome\ChromeOptions;
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\Remote\DesiredCapabilities;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Collection;
use App\Models\User;
use App\Models\Role;
use App\Models\Address;

abstract class DuskTestCase extends BaseTestCase
{
    use CreatesApplication, DatabaseMigrations;

    /**
     * Prepare for Dusk test execution.
     *
     * @beforeClass
     * @return void
     */
    public static function prepare()
    {
        static::startChromeDriver();
    }

    /**
     * Create the RemoteWebDriver instance.
     *
     * @return \Facebook\WebDriver\Remote\RemoteWebDriver
     */
    protected function driver()
    {
        $options = (new ChromeOptions)->addArguments([
            '--disable-gpu',
            //'--headless',
            '--window-size=1920,1920'
        ]);

        return RemoteWebDriver::create(
            'http://localhost:9515',
            DesiredCapabilities::chrome()->setCapability(
                ChromeOptions::CAPABILITY,
                $options
            )
        );
    }

    public function login($admin = false)
    {
        $user = factory(User::class)->create();
        
        if ($admin) {
            $this->makeAdmin($user);
        }

        $this->browse(function ($browser) use ($user) {
            $browser->loginAs($user);
        });
    }

    private function makeAdmin($user)
    {
        $admin = Role::where('name', Role::ADMIN)->first();
        if (!$admin) {
            $admin = new Role();
            $admin->name = Role::ADMIN;
            $admin->description = 'An Admin User';
            $admin->save();
        }
        $user->roles()->attach($admin);
    }
}
