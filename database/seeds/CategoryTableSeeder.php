<?php

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoryTableSeeder extends Seeder
{

    public function run()
    {
        for ($i = 0; $i < 10; $i++) {
            factory(Category::class)->create();
        }
    }
}
