<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\Brand::factory('10')->create();
        \App\Models\Brand::create(['title' => 'Apple']);
        \App\Models\Brand::create(['title' => 'Reboake']);
        \App\Models\Brand::create(['title' => 'Tata']);
        \App\Models\Brand::create(['title' => 'Goochi']);
        \App\Models\Brand::create(['title' => 'Red Cheif']);
        \App\Models\Brand::create(['title' => 'Nexsan']);

    }
}
