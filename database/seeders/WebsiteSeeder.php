<?php

namespace Database\Seeders;

use App\Models\Website;
use Illuminate\Database\Seeder;

class WebsiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Website::create([
            'logo' => 'storage/website/logo.png',
            'email' => 'default@mail.com',
            'phone' => '+8801754100439',
            'address' => 'Mohakhali,Dhaka,Bangladesh',
            'fb' => '#',
            'tw' => '#',
            'link' => '#',
            'ins' => '#',
        ]);
    }
}
