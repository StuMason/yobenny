<?php

use Illuminate\Database\Seeder;
use App\Thing;
use App\User;

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
        for($i = 0; $i < 10; $i++) {
            factory(Thing::class)->create([
                'approved_by' => $admin->id
            ]);
        }
    }
}
