<?php

use Illuminate\Database\Seeder;
use App\Models\Event;
use App\Models\User;
use App\Models\Category;
use App\Models\Address;

class EventTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::where('email', env('ADMIN_EMAIL'))->first();
        factory(Event::class, 10)->create([
            'approved_by' => $admin->uuid,
        ])->each(function ($event) {
            $event->categories()->attach(Category::all());
            $event->address()->save(factory(Address::class)->create());
        });
    }
}
