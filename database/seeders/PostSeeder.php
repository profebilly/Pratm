<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Str;

class PostSeeder extends Seeder
{
    public function run()
    {
        // Ensure we have a user
        $user = User::first();
        if (!$user) {
            $user = User::create([
                'name' => 'Admin',
                'email' => 'admin@example.com',
                'password' => bcrypt('password'),
                'role' => 'admin'
            ]);
        }

        // Create some categories if they don't exist
        $categories = ['News', 'Events', 'Sports', 'Academic'];
        $categoryIds = [];
        foreach ($categories as $catName) {
            $category = Category::firstOrCreate(['name' => $catName], ['slug' => Str::slug($catName)]);
            $categoryIds[] = $category->id;
        }

        // Create dummy posts
        $posts = [
            [
                'title' => 'Welcome to the New School Year!',
                'body' => "We are excited to welcome all students back to campus for the new academic year. \n\nThis year brings many new opportunities and improvements to our facilities. We have renovated the science labs and expanded the library collection. \n\nWe wish everyone a successful and productive year ahead!",
                'image' => 'https://images.unsplash.com/photo-1523050854058-8df90110c9f1?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80',
            ],
            [
                'title' => 'Annual Science Fair Winners',
                'body' => "Congratulations to all the participants of this year's Science Fair! \n\nThe projects were truly outstanding, showcasing the creativity and scientific inquiry of our students. \n\nSpecial mention to the winners of the robotics category for their innovative design.",
                'image' => 'https://images.unsplash.com/photo-1564981797816-1043664bf78d?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80',
            ],
            [
                'title' => 'Sports Day Highlights',
                'body' => "Our annual Sports Day was a huge success! \n\nStudents competed in various track and field events, demonstrating great sportsmanship and team spirit. \n\nCheck out the photo gallery on our website to see the highlights of the day.",
                'image' => 'https://images.unsplash.com/photo-1461896836934-ffe607ba8211?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80',
            ],
             [
                'title' => 'Parent-Teacher Meeting Schedule',
                'body' => "The upcoming Parent-Teacher meetings are scheduled for next week. \n\nPlease check your email for the specific time slots allocated for your child's class. \n\nWe look forward to discussing your child's progress.",
                'image' => 'https://images.unsplash.com/photo-1577896334614-501d3751811e?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80',
            ],
             [
                'title' => 'New Art Exhibition Opening',
                'body' => "The school's art department is proud to announce the opening of the student art exhibition. \n\nCome and admire the beautiful paintings, sculptures, and digital art created by our talented students. \n\nThe exhibition will be open to the public for two weeks.",
                'image' => 'https://images.unsplash.com/photo-1460661419201-fd4cecdf8a8b?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80',
            ],
        ];

        foreach ($posts as $postData) {
            $post = Post::create([
                'title' => $postData['title'],
                'slug' => Str::slug($postData['title']),
                'body' => $postData['body'],
                'image' => $postData['image'],
                'status' => 'published',
                'user_id' => $user->id,
            ]);
            
            // Attach random categories
            $post->categories()->attach([$categoryIds[array_rand($categoryIds)]]);
        }
    }
}
