<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Category::create([
            'name' => 'Popular',
            'description' => 'Popular Game Description',
            'status' => 'active',
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        Category::create([
            'name' => 'New',
            'description' => 'New Game Description',
            'status' => 'active',
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        Category::create([
            'name' => 'Recommended',
            'description' => 'Recommended Game Description',
            'status' => 'active',
            'created_by' => 1,
            'updated_by' => 1,
        ]);
    }
}
