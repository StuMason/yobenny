<?php

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoryTableSeeder extends Seeder
{
    public function run()
    {
        factory(Category::class, 10)->create();
    }
}
