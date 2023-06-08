<?php

namespace Database\Seeders;

use App\Models\ContentOwner;
use Illuminate\Database\Seeder;

class ContentOwnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ContentOwner::create([
            'name' => 'Content Owner 1',
            'email' => 'content-owner1@example.com',
            'phone' => '01923988380',
            'address' => 'Content Owner 1 Address',
        ]);

        ContentOwner::create([
            'name' => 'Content Owner 2',
            'email' => 'content-owner2@example.com',
            'phone' => '01923988381',
            'address' => 'Content Owner 2 Address',
        ]);
    }
}
