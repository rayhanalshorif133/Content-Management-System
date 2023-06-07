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

        $category = Category::create([
            'name' => 'Category 1',
            'description' => 'Category 1 Description',
            'status' => 'active',
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        SubCategory::create([
            'category_id' => $category->id,
            'name' => 'Category 1 sub',
            'description' => 'Category 1 Description',
            'status' => 'active',
            'created_by' => 1,
            'updated_by' => 1,
        ]);
    }
}
