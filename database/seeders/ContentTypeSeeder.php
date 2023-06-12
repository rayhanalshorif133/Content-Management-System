<?php

namespace Database\Seeders;

use App\Models\ContentType;
use Illuminate\Database\Seeder;

class ContentTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ContentType::create([
            'name' => 'Video',
            'description' => 'Video',
            'status' => 'active',
        ]);

        ContentType::create([
            'name' => 'Audio',
            'description' => 'Audio',
            'status' => 'active',
        ]);

        ContentType::create([
            'name' => 'Wallpaper',
            'description' => 'Wallpaper',
            'status' => 'active',
        ]);
    }
}
