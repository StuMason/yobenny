<?php

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoryTableSeeder extends Seeder
{
    public function run()
    {
        collect([
            'appearance',
            'signing',
            'camp',
            'retreat',
            'conference',
            'convention',
            'workshop',
            'training',
            'dinner',
            'gala',
            'festival',
            'fair',
            'game',
            'competition',
            'networking',
            'meeting',
            'party',
            'rave',
            'disco',
            'social gathering',
            'race',
            'endurance event',
            'rally',
            'screening',
            'talk',
            'seminar',
            'tour',
            'tournament',
            'tradeshow',
            'expo',
            'film',
            'media',
            'auto',
            'boat',
            'air',
            'sea',
            'seaside',
            'fashion',
            'beauty',
            'health',
            'wellness',
            'entertainment',
            'hobbies',
            'hobby',
            'food',
            'drink',
            'government',
            'politics',
            'religion',
            'spirituality',
            'travel',
            'sport',
            'fitness',
            'charity',
            'causes'
        ])->each(function ($name) {
            factory(Category::class)->create(['name' => $nam]);
        });
    }
}
