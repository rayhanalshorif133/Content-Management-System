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
            'image' => 'https://png.pngtree.com/png-vector/20220709/ourmid/pngtree-businessman-user-avatar-wearing-suit-with-red-tie-png-image_5809521.png',
        ]);

        ContentOwner::create([
            'name' => 'Content Owner 2',
            'image' => 'https://png.pngtree.com/png-vector/20220709/ourmid/pngtree-businessman-user-avatar-wearing-suit-with-red-tie-png-image_5809521.png',
        ]);
    }
}
