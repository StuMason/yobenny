<?php

use Illuminate\Database\Seeder;
use App\Models\Thing;
use App\Models\User;
use App\Models\Category;
use App\Models\Address;

class ThingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::where('email', 'admin@admin.admin')->first();
        factory(Thing::class, 10)->create([
            'approved_by' => $admin->uuid,
        ])->each(function ($thing) {
            $thing->categories()->attach(Category::all());
            $thing->address()->save(factory(Address::class)->create());
        });
    }
}
