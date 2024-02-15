<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // factory(Category::class)->times(10)->create();
        \App\Models\Category::create(['title' => 'Male']);
        \App\Models\Category::create(['title' => 'Female']);
        \App\Models\Category::create(['title' => 'Kids']);
    }
}
