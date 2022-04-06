<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        User::factory()->admin()->create(['email' => 'admin@users.test']);
        $this->command->info('Admin Created.');
        User::factory(15)->user()->create();
        $this->command->info('Users Created.');
        Post::factory(10)->published()->forExistingAdmin()->has(Comment::factory(3)->forExistingUser())->create();
        $this->command->info('Posts with Comments Created.');
    }
}
