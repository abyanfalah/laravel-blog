<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(4)->create();
        User::create([
            'name'              => 'Abyan Falah',
            'username'          => 'abyan',
            'email'             => 'abyan@gmail.com',
            'email_verified_at' => now(),
            // 'is_admin'          => true,
            'password'          => bcrypt('scootermania'),
            'remember_token'    => Str::random(10),
        ]);

        User::create([
            'name'              => 'The Great Admin',
            'username'          => 'admin',
            'email'             => 'admin@gmail.com',
            'email_verified_at' => now(),
            'is_admin'          => true,
            'password'          => bcrypt('admin'),
            'remember_token'    => Str::random(10),
        ]);

        Category::create([
            'name' => 'Web Programming',
            'slug' => 'web-programming'
        ]);

        Category::create([
            'name' => 'Road Cycling',
            'slug' => 'road-cycling'
        ]);

        Category::create([
            'name' => 'Music',
            'slug' => 'music'
        ]);

        Category::create([
            'name' => 'Personal',
            'slug' => 'personal'
        ]);

        Post::factory(30)->create();
    }
}
