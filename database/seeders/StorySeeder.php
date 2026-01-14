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
            // Data asli Anda (1-5)
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
            
            // 45 Data tambahan (6-50)
            [
                'title' => 'Starting My Garden from Scratch',
                'excerpt' => 'A beginner guide to creating a thriving vegetable garden in your backyard.',
                'content' => 'I never thought I had a green thumb until I started my own garden this spring. From preparing the soil to choosing the right vegetables, I learned so much. Now I harvest fresh tomatoes, lettuce, and herbs every week.',
                'featured_image' => 'garden.jpeg',
                'category_id' => 1,
                'is_featured' => false,
                'tags' => ['gardening', 'vegetables', 'outdoor']
            ],
            [
                'title' => 'Coffee Shop Hopping in Tokyo',
                'excerpt' => 'Discovering the unique coffee culture in Tokyo hidden cafes.',
                'content' => 'Tokyo has some of the most amazing coffee shops I have ever visited. From traditional kissaten to modern specialty cafes, each place has its own character. My favorite was a tiny shop in Shimokitazawa run by a master barista.',
                'featured_image' => 'tokyo-coffee.jpeg',
                'category_id' => 5,
                'is_featured' => true,
                'tags' => ['tokyo', 'coffee', 'japan']
            ],
            [
                'title' => 'Meal Prep Sunday Made Easy',
                'excerpt' => 'My simple system for preparing healthy meals for the entire week.',
                'content' => 'Meal prep used to intimidate me until I developed this easy system. Now I spend just 2 hours on Sunday preparing five days worth of healthy lunches and dinners. The key is choosing recipes that share ingredients.',
                'featured_image' => 'meal-prep.jpeg',
                'category_id' => 3,
                'is_featured' => false,
                'tags' => ['meal-prep', 'healthy', 'cooking']
            ],
            [
                'title' => 'Teaching My Kids About Money',
                'excerpt' => 'Age-appropriate ways to introduce financial literacy to children.',
                'content' => 'Financial education starts at home. I began teaching my kids about money using simple concepts like saving, spending, and sharing. We use a clear jar system so they can see their savings grow.',
                'featured_image' => 'kids-money.jpeg',
                'category_id' => 4,
                'is_featured' => false,
                'tags' => ['kids', 'money', 'education']
            ],
            [
                'title' => 'Thrifting Tips for Beginners',
                'excerpt' => 'How to find amazing vintage pieces without breaking the bank.',
                'content' => 'Thrift shopping has become my favorite hobby. Not only is it sustainable, but I find unique pieces that nobody else has. My best finds include a vintage leather jacket and designer jeans for under twenty dollars.',
                'featured_image' => 'thrifting.jpeg',
                'category_id' => 2,
                'is_featured' => false,
                'tags' => ['thrifting', 'vintage', 'sustainable']
            ],
            [
                'title' => 'My Evening Wind-Down Ritual',
                'excerpt' => 'Creating a peaceful transition from day to night for better sleep.',
                'content' => 'Good sleep starts hours before bedtime. My evening ritual includes dimming lights, avoiding screens, drinking herbal tea, and journaling. This simple routine has improved my sleep quality dramatically.',
                'featured_image' => 'evening-routine.jpeg',
                'category_id' => 1,
                'is_featured' => false,
                'tags' => ['evening', 'sleep', 'wellness']
            ],
            [
                'title' => 'Homemade Pizza Night',
                'excerpt' => 'The foolproof dough recipe that makes restaurant-quality pizza at home.',
                'content' => 'Friday nights are pizza nights in our house. After perfecting my dough recipe, we never order delivery anymore. The secret is letting the dough rise slowly in the fridge for 24 hours.',
                'featured_image' => 'pizza.jpeg',
                'category_id' => 3,
                'is_featured' => false,
                'tags' => ['pizza', 'recipe', 'family']
            ],
            [
                'title' => 'Hiking with Kids: Essential Tips',
                'excerpt' => 'Making outdoor adventures fun and safe for the whole family.',
                'content' => 'Getting kids excited about hiking takes some strategy. We start with short trails, bring plenty of snacks, and turn it into a game by looking for wildlife and interesting rocks.',
                'featured_image' => 'hiking-kids.jpeg',
                'category_id' => 4,
                'is_featured' => false,
                'tags' => ['hiking', 'kids', 'outdoor']
            ],
            [
                'title' => 'Building My Dream Bookshelf',
                'excerpt' => 'A DIY project that transformed my reading corner.',
                'content' => 'I always wanted a floor-to-ceiling bookshelf but could not find the perfect one. So I built it myself using reclaimed wood. The project took three weekends but the result is exactly what I envisioned.',
                'featured_image' => 'book-shelfs.jpeg',
                'category_id' => 1,
                'is_featured' => false,
                'tags' => ['diy', 'books', 'home']
            ],
            [
                'title' => 'Exploring Local Farmers Markets',
                'excerpt' => 'Why I switched to buying seasonal produce from local vendors.',
                'content' => 'Shopping at farmers markets has reconnected me with food. I love talking to the people who grow my vegetables, trying new seasonal produce, and supporting local agriculture.',
                'featured_image' => 'farmers-market.jpg',
                'category_id' => 3,
                'is_featured' => false,
                'tags' => ['local', 'organic', 'fresh']
            ],
            [
                'title' => 'My Minimalist Makeup Routine',
                'excerpt' => 'Five products that are all you need for everyday beauty.',
                'content' => 'I simplified my makeup collection to just five essential products. This minimalist approach saves time in the morning and my skin has never looked better.',
                'featured_image' => 'makeup.jpeg',
                'category_id' => 2,
                'is_featured' => false,
                'tags' => ['makeup', 'beauty', 'minimalism']
            ],
            [
                'title' => 'Road Trip Along the Coast',
                'excerpt' => 'Driving down Highway 1 and discovering hidden beaches.',
                'content' => 'Last summer we took an unforgettable road trip along the Pacific Coast Highway. We stopped at small beach towns, watched sunsets over the ocean, and ate the freshest seafood.',
                'featured_image' => 'roadtrip.jpeg',
                'category_id' => 5,
                'is_featured' => false,
                'tags' => ['road-trip', 'beach', 'travel']
            ],
            [
                'title' => 'Bedtime Stories That Spark Imagination',
                'excerpt' => 'Creating magical moments with children through storytelling.',
                'content' => 'Reading to my kids before bed is my favorite part of the day. We explore different worlds together through books, and often they ask me to make up stories about their favorite characters.',
                'featured_image' => 'bedtime-stories.jpg',
                'category_id' => 4,
                'is_featured' => false,
                'tags' => ['bedtime', 'stories', 'reading']
            ],
            [
                'title' => 'Sourdough Bread Success',
                'excerpt' => 'After many failures, I finally mastered the art of sourdough baking.',
                'content' => 'Sourdough baking is both science and art. It took me months to understand my starter and perfect the timing, but now I bake two loaves every week. Nothing beats the smell of fresh bread.',
                'featured_image' => 'sourdough.jpg',
                'category_id' => 3,
                'is_featured' => true,
                'tags' => ['sourdough', 'baking', 'bread']
            ],
            [
                'title' => 'Organizing My Home Office',
                'excerpt' => 'Creating a productive workspace that inspires creativity.',
                'content' => 'Working from home requires a dedicated space. I transformed a corner of my bedroom into an organized office with proper lighting, storage solutions, and plants that boost my mood.',
                'featured_image' => 'home-office.jpg',
                'category_id' => 1,
                'is_featured' => false,
                'tags' => ['office', 'organization', 'productivity']
            ],
            [
                'title' => 'Styling Vintage Denim',
                'excerpt' => 'Modern ways to wear classic denim pieces.',
                'content' => 'Vintage denim never goes out of style. I love pairing high-waisted jeans with cropped sweaters or wearing an oversized denim jacket over summer dresses. These timeless pieces work for any season.',
                'featured_image' => 'vintage-denim.jpg',
                'category_id' => 2,
                'is_featured' => false,
                'tags' => ['denim', 'vintage', 'style']
            ],
            [
                'title' => 'Weekend in the Mountains',
                'excerpt' => 'Escaping city life for fresh air and stunning views.',
                'content' => 'Sometimes you just need to get away. We rented a cabin in the mountains for the weekend, hiked forest trails, and spent evenings by the fireplace. It was the perfect reset.',
                'featured_image' => 'mountains.jpeg',
                'category_id' => 5,
                'is_featured' => false,
                'tags' => ['mountains', 'cabin', 'nature']
            ],
            [
                'title' => 'Teaching Kids to Cook',
                'excerpt' => 'Simple recipes that children can make with supervision.',
                'content' => 'Cooking with kids is messy but rewarding. We start with simple recipes like scrambled eggs and fruit smoothies. They are learning valuable life skills while having fun in the kitchen.',
                'featured_image' => 'kids-cooking.jpg',
                'category_id' => 4,
                'is_featured' => false,
                'tags' => ['cooking', 'kids', 'skills']
            ],
            [
                'title' => 'My Meditation Practice',
                'excerpt' => 'How ten minutes of daily meditation changed my mindset.',
                'content' => 'I was skeptical about meditation until I committed to just ten minutes every morning. Now it is my anchor. I feel calmer, more focused, and better equipped to handle stress.',
                'featured_image' => 'meditation.jpg',
                'category_id' => 1,
                'is_featured' => false,
                'tags' => ['meditation', 'mindfulness', 'wellness']
            ],
            [
                'title' => 'One-Pot Pasta Recipes',
                'excerpt' => 'Delicious dinners with minimal cleanup required.',
                'content' => 'One-pot meals are a game changer for busy weeknights. Everything cooks together, the flavors meld beautifully, and there is only one dish to wash. My family loves the creamy tomato version.',
                'featured_image' => 'one-pot-pasta.jpg',
                'category_id' => 3,
                'is_featured' => false,
                'tags' => ['pasta', 'easy', 'dinner']
            ],
            [
                'title' => 'Accessorizing Basics',
                'excerpt' => 'How the right accessories elevate simple outfits.',
                'content' => 'A plain white tee and jeans can look amazing with the right accessories. I invest in quality scarves, statement earrings, and versatile bags that transform basic pieces.',
                'featured_image' => 'accsesoris.jpeg',
                'category_id' => 2,
                'is_featured' => false,
                'tags' => ['accessories', 'fashion', 'style']
            ],
            [
                'title' => 'Camping Under the Stars',
                'excerpt' => 'Our first family camping trip and lessons learned.',
                'content' => 'We finally took the kids camping and it was magical. Roasting marshmallows, sleeping under the stars, and waking up to birdsong made memories that will last forever.',
                'featured_image' => 'camping.jpeg',
                'category_id' => 5,
                'is_featured' => false,
                'tags' => ['camping', 'family', 'outdoor']
            ],
            [
                'title' => 'Screen Time Balance for Families',
                'excerpt' => 'Creating healthy tech boundaries without constant battles.',
                'content' => 'Managing screen time does not have to be a daily fight. We established clear rules, created tech-free zones, and lead by example. Our kids now self-regulate much better.',
                'featured_image' => 'screen-time.jpg',
                'category_id' => 4,
                'is_featured' => false,
                'tags' => ['screen-time', 'parenting', 'balance']
            ],
            [
                'title' => 'Bullet Journaling for Beginners',
                'excerpt' => 'Starting a simple system to organize your life.',
                'content' => 'I started bullet journaling to get organized and discovered it is also creative and therapeutic. My journal tracks habits, plans meals, and serves as a gratitude log.',
                'featured_image' => 'bullet-journal.jpg',
                'category_id' => 1,
                'is_featured' => false,
                'tags' => ['journal', 'organization', 'planning']
            ],
            [
                'title' => 'Homemade Granola Recipe',
                'excerpt' => 'Crunchy, healthy breakfast that is better than store-bought.',
                'content' => 'Making granola at home is easier than you think. I mix oats with nuts, seeds, honey, and cinnamon, then bake until golden. It stays fresh for weeks in an airtight container.',
                'featured_image' => 'granola.jpeg',
                'category_id' => 3,
                'is_featured' => false,
                'tags' => ['granola', 'breakfast', 'healthy']
            ],
            [
                'title' => 'Building Confidence in Kids',
                'excerpt' => 'Encouraging children to believe in themselves.',
                'content' => 'Confidence is not something kids are born with. We build it through encouragement, letting them fail safely, and celebrating effort over results.',
                'featured_image' => 'confidence-kids.jpeg',
                'category_id' => 4,
                'is_featured' => false,
                'tags' => ['confidence', 'kids', 'growth']
            ],
            [
                'title' => 'Sustainable Fashion Choices',
                'excerpt' => 'Shopping consciously and building an eco-friendly wardrobe.',
                'content' => 'I am trying to shop more sustainably by choosing quality over quantity, buying secondhand, and supporting ethical brands. Fashion can be both stylish and responsible.',
                'featured_image' => 'sustainable-fashion.jpeg',
                'category_id' => 2,
                'is_featured' => false,
                'tags' => ['sustainable', 'eco-friendly', 'fashion']
            ],
            [
                'title' => 'Island Hopping in Greece',
                'excerpt' => 'Exploring the beauty of Santorini, Mykonos, and Crete.',
                'content' => 'Greece exceeded all my expectations. Each island has its own personality, from Santorini stunning sunsets to Crete rich history. The food, people, and landscapes are unforgettable.',
                'featured_image' => 'greece.jpeg',
                'category_id' => 5,
                'is_featured' => true,
                'tags' => ['greece', 'islands', 'travel']
            ],
            [
                'title' => 'Creating a Reading Routine',
                'excerpt' => 'How I started reading 50 books a year.',
                'content' => 'I used to struggle to finish even one book a year. Now I read before bed instead of scrolling my phone, always carry a book, and joined a book club for accountability.',
                'featured_image' => 'reading-routine.jpeg',
                'category_id' => 1,
                'is_featured' => false,
                'tags' => ['reading', 'books', 'habits']
            ],
            [
                'title' => 'Easy Weeknight Stir Fry',
                'excerpt' => 'Quick and healthy dinner that uses whatever vegetables you have.',
                'content' => 'Stir fry is my go-to when I need dinner fast. I use whatever vegetables are in my fridge, add protein, toss with soy sauce and garlic, and serve over rice. Done in 20 minutes.',
                'featured_image' => 'stir-fry.jpeg',
                'category_id' => 3,
                'is_featured' => false,
                'tags' => ['stir-fry', 'quick', 'dinner']
            ],
            [
                'title' => 'Layering Clothes for Fall',
                'excerpt' => 'Mastering the art of autumn dressing.',
                'content' => 'Fall is my favorite season for fashion. I love layering light sweaters over button-downs, adding scarves, and wearing ankle boots. It is all about texture and proportion.',
                'featured_image' => 'fall-fashion.jpeg',
                'category_id' => 2,
                'is_featured' => false,
                'tags' => ['fall', 'layering', 'autumn']
            ],
            [
                'title' => 'Teaching Gratitude to Children',
                'excerpt' => 'Simple practices that help kids appreciate what they have.',
                'content' => 'We started a gratitude jar where everyone writes one thing they are thankful for each day. At the end of the month, we read them together. It is beautiful to see what they notice.',
                'featured_image' => 'gratitude-kids.jpeg',
                'category_id' => 4,
                'is_featured' => false,
                'tags' => ['gratitude', 'kids', 'values']
            ],
            [
                'title' => 'Decluttering Your Space',
                'excerpt' => 'The method that finally helped me let go of excess stuff.',
                'content' => 'I spent a weekend decluttering using the question: Does this add value to my life? If not, it went. My space feels lighter and I can finally find what I need.',
                'featured_image' => 'decluter.jpeg',
                'category_id' => 1,
                'is_featured' => false,
                'tags' => ['declutter', 'minimalism', 'organization']
            ],
            [
                'title' => 'Exploring Local Hiking Trails',
                'excerpt' => 'Discovering natural beauty in my own backyard.',
                'content' => 'I used to think I needed to travel far for adventure. Then I started exploring local trails and found incredible views, waterfalls, and peaceful spots just 30 minutes from home.',
                'featured_image' => 'local-trails.jpeg',
                'category_id' => 5,
                'is_featured' => false,
                'tags' => ['hiking', 'local', 'nature']
            ],
            [
                'title' => 'Smoothie Bowl Perfection',
                'excerpt' => 'Creating Instagram-worthy breakfast bowls at home.',
                'content' => 'Smoothie bowls are my favorite breakfast. I blend frozen fruit with a little liquid, pour into a bowl, and top with granola, fresh fruit, and nut butter. Beautiful and nutritious.',
                'featured_image' => 'smoothie-bowl.jpeg',
                'category_id' => 3,
                'is_featured' => false,
                'tags' => ['smoothie', 'breakfast', 'healthy']
            ],
            [
                'title' => 'Choosing the Right Jeans',
                'excerpt' => 'Finding the perfect fit for your body type.',
                'content' => 'After years of trying different styles, I finally understand which jeans work for my body. High-waisted straight leg are my go-to. They are comfortable, flattering, and versatile.',
                'featured_image' => 'perfect-jeans.jpg',
                'category_id' => 2,
                'is_featured' => false,
                'tags' => ['jeans', 'fit', 'style']
            ],
            [
                'title' => 'Family Game Night Ideas',
                'excerpt' => 'Bringing everyone together without screens.',
                'content' => 'We started a weekly game night tradition. Board games, card games, and charades have created so much laughter and connection. It is now everyone favorite night of the week.',
                'featured_image' => 'game-night.jpeg',
                'category_id' => 4,
                'is_featured' => false,
                'tags' => ['games', 'family', 'fun']
            ],
            [
                'title' => 'Morning Yoga Practice',
                'excerpt' => 'Starting the day with movement and mindfulness.',
                'content' => 'I roll out my mat first thing and do 20 minutes of gentle yoga. It wakes up my body, clears my mind, and sets a positive tone for the entire day.',
                'featured_image' => 'morning-yoga.jpeg',
                'category_id' => 1,
                'is_featured' => false,
                'tags' => ['yoga', 'morning', 'fitness']
            ],
            [
                'title' => 'Budget-Friendly City Break',
                'excerpt' => 'Exploring a new city without spending a fortune.',
                'content' => 'You do not need a big budget to have a great city break. I stayed in a hostel, ate street food, used public transport, and did free walking tours. I had an amazing time for under $300.',
                'featured_image' => 'budget-travel.jpeg',
                'category_id' => 5,
                'is_featured' => false,
                'tags' => ['budget', 'travel', 'city']
            ],
            [
                'title' => 'Slow Cooker Magic',
                'excerpt' => 'Set it and forget it meals for busy families.',
                'content' => 'My slow cooker is my best friend on busy days. I throw in ingredients in the morning and come home to delicious soup, stew, or pulled pork. Dinner is ready with zero effort.',
                'featured_image' => 'slow-cooker.jpg',
                'category_id' => 3,
                'is_featured' => false,
                'tags' => ['slow-cooker', 'easy', 'family']
            ],
            [
                'title' => 'Indoor Activities for Rainy Days',
                'excerpt' => 'Keeping kids entertained when stuck inside.',
                'content' => 'Rainy days do not have to be boring. We build blanket forts, do science experiments, bake together, and have indoor picnics. Sometimes the best memories happen indoors.',
                'featured_image' => 'indoor-kids.jpeg',
                'category_id' => 4,
                'is_featured' => false,
                'tags' => ['indoor', 'rainy-day', 'activities']
            ],
            [
                'title' => 'Curating Your Social Media Feed',
                'excerpt' => 'Creating a positive online experience.',
                'content' => 'I cleaned up my social media by unfollowing accounts that made me feel bad and following people who inspire me. My feed is now a source of positivity rather than stress.',
                'featured_image' => 'social-media.jpeg',
                'category_id' => 1,
                'is_featured' => false,
                'tags' => ['social-media', 'wellness', 'digital']
            ],
            [
                'title' => 'Classic White Shirt Styling',
                'excerpt' => 'Ten ways to wear the most versatile wardrobe piece.',
                'content' => 'A classic white shirt is endlessly versatile. I wear mine tucked into jeans, layered under sweaters, tied at the waist, or dressed up with blazers. It works for everything.',
                'featured_image' => 'white-shirt.jpeg',
                'category_id' => 2,
                'is_featured' => false,
                'tags' => ['white-shirt', 'basics', 'versatile']
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