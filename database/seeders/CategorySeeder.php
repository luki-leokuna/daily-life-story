<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'Lifestyle', 'slug' => 'lifestyle', 'color' => '#EC4899'],
            ['name' => 'Fashion', 'slug' => 'fashion', 'color' => '#8B5CF6'],
            ['name' => 'Food', 'slug' => 'food', 'color' => '#F59E0B'],
            ['name' => 'Parenting', 'slug' => 'parenting', 'color' => '#10B981'],
            ['name' => 'Travel', 'slug' => 'travel', 'color' => '#3B82F6'],
            ['name' => 'Relationships', 'slug' => 'relationships', 'color' => '#EF4444'],
            ['name' => 'Culture', 'slug' => 'culture', 'color' => '#6366F1'],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}