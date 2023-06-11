<?php

namespace Database\Seeders;

use App\Models\Content;
use Illuminate\Database\Seeder;

class ContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        for ($index = 0; $index < 500; $index++) {
            Content::create([
                'category_id' => 1,
                'owner_id'  => 1,
                'type_id' => 1,
                'title' => 'title ' . $index,
                'short_des' => 'short des',
                'description' => 'description',
                'artist_name' => 'artist',
                'price' => 12 * $index,
                'created_by' => "admin"
            ]);
        }
    }
}
