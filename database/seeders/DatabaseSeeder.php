<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create Roles Users if they don't exist
        $admin = User::firstOrCreate(
            ['email' => 'admin@school.com'],
            [
                'name' => 'Administrator',
                'password' => Hash::make('password'),
                'role' => 'admin',
            ]
        );

        $teacher = User::firstOrCreate(
            ['email' => 'teacher@school.com'],
            [
                'name' => 'Ms. Teacher',
                'password' => Hash::make('password'),
                'role' => 'teacher',
            ]
        );

        $student = User::firstOrCreate(
            ['email' => 'student@school.com'],
            [
                'name' => 'John Student',
                'password' => Hash::make('password'),
                'role' => 'student',
            ]
        );

        $parent = User::firstOrCreate(
            ['email' => 'parent@school.com'],
            [
                'name' => 'Mr. Parent',
                'password' => Hash::make('password'),
                'role' => 'parent',
            ]
        );

        // Generate random users
        User::factory(10)->create();

        // Generate Posts
        // We use the existing PostSeeder logic but expanded or use Factory
        // Let's use Factory for bulk creation
        \App\Models\Post::factory(20)->create([
            'user_id' => $admin->id // Some by admin
        ]);
        
        \App\Models\Post::factory(10)->create([
            'user_id' => $teacher->id // Some by teacher
        ]);

        // Add comments to posts
        $posts = \App\Models\Post::all();
        $users = \App\Models\User::all();
        $faker = \Faker\Factory::create();

        foreach ($posts as $post) {
            // Random number of comments per post
            $commentCount = rand(0, 5);
            for ($i = 0; $i < $commentCount; $i++) {
                \App\Models\Comment::create([
                    'post_id' => $post->id,
                    'user_id' => $users->random()->id,
                    'body' => $faker->paragraph(),
                ]);
            }
            
            // Attach random categories if not attached
            if ($post->categories()->count() == 0) {
                 $categories = \App\Models\Category::all();
                 if($categories->count() > 0) {
                    $post->categories()->attach($categories->random(rand(1, 2))->pluck('id')->toArray());
                 }
            }
        }
    }
}
