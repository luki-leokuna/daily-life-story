<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Story;
use App\Models\StoryTag;

class StorySeeder extends Seeder
{
    public function run(): void
    {
        $stories = [
            [
                'title' => 'A Morning Routine That Changed My Life',
                'excerpt' => 'How I transformed my chaotic mornings into peaceful, productive starts to my day.',
                'content' => 'It all started when I realized I was rushing through every morning, feeling stressed before the day even began. I decided to make a change and created a simple morning routine that has completely transformed my life. Now I wake up 30 minutes earlier, spend time in quiet reflection, and set intentions for the day ahead.',
                'featured_image' => 'morning-routine.jpg',
                'category_id' => 1,
                'is_featured' => true,
                'tags' => ['morning', 'routine', 'self-care']
            ],
            [
                'title' => 'The Best Chocolate Chip Cookie Recipe',
                'excerpt' => 'After years of experimentation, I finally found the perfect chocolate chip cookie recipe.',
                'content' => 'There is something magical about the smell of freshly baked cookies filling your home. After testing dozens of recipes, I have finally perfected my chocolate chip cookie recipe. The secret? Brown butter and a mix of chocolate chunks and chips.',
                'featured_image' => 'cookies.jpg',
                'category_id' => 3,
                'is_featured' => false,
                'tags' => ['baking', 'recipe', 'dessert']
            ],
            [
                'title' => 'Weekend in Paris: A Photo Diary',
                'excerpt' => 'Capturing the magic of Paris through my lens during a spontaneous weekend trip.',
                'content' => 'Paris has always been on my bucket list, and last weekend I finally made it happen. From the Eiffel Tower to hidden cafes in Montmartre, every corner of this city is worth photographing. Here are my favorite moments from the trip.',
                'featured_image' => 'paris.jpg',
                'category_id' => 5,
                'is_featured' => false,
                'tags' => ['paris', 'europe', 'photography']
            ],
            [
                'title' => 'Raising Kind Kids in a Digital World',
                'excerpt' => 'Practical tips for teaching empathy and kindness to children growing up with screens.',
                'content' => 'As a parent in 2026, one of my biggest concerns is raising compassionate kids in an increasingly digital world. Here are the strategies that have worked for our family, from limiting screen time to modeling kindness in our daily interactions.',
                'featured_image' => 'parenting.jpg',
                'category_id' => 4,
                'is_featured' => false,
                'tags' => ['kids', 'parenting', 'digital']
            ],
            [
                'title' => 'My Capsule Wardrobe Journey',
                'excerpt' => 'How I simplified my closet and found my personal style.',
                'content' => 'I used to have a closet full of clothes but nothing to wear. Sound familiar? Creating a capsule wardrobe has been life-changing. I now have 40 pieces that I absolutely love and that all work together.',
                'featured_image' => 'fashion.jpg',
                'category_id' => 2,
                'is_featured' => false,
                'tags' => ['fashion', 'minimalism', 'style']
            ],
        ];

        foreach ($stories as $storyData) {
            $tags = $storyData['tags'];
            unset($storyData['tags']);

            $story = Story::create($storyData);

            foreach ($tags as $tag) {
                StoryTag::create([
                    'story_id' => $story->id,
                    'tag' => $tag
                ]);
            }
        }
    }
}