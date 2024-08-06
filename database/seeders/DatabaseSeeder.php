<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Category::create([
            "slug" => "personal",
            "name" => "Personal",
        ]);

        User::create([
            "name" => "osama seyam",
            "username" =>"osama",
            "email" => "osama@admin.com",
            "password" => "123123123",
        ]);
    }
}
