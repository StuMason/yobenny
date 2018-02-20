<?php

use Illuminate\Database\Seeder;
use App\Models\Thing;
use App\Models\User;
use App\Models\Category;

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
        for ($i = 0; $i < 10; $i++) {
            $thing = factory(Thing::class)->create([
                'approved_by' => $admin->uuid
            ]);
            $thing->categories()->attach(Category::all());
        }
    }
}
