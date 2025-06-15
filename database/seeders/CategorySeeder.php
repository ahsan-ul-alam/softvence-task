<?php

namespace Database\Seeders;

use App\Models\category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 5; $i++) {
            category::create([
                'name' => 'Category ' . $i,
                'slug' => 'category-' . $i,
                'description' => 'Category ' . $i . ' description',
            ]);
        }
    }
}
