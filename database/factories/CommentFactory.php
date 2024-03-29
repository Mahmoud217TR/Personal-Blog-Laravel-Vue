<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\Sequence;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'content' => $this->faker->paragraph(5),
            'user_id' => User::factory(),
            'post_id' => Post::factory()->published(),
        ];
    }

    public function forExistingUser(){
        return $this->state(new Sequence(fn ($sequence) =>['user_id' => User::all()->random()]));
    }

    public function forExistingPost(){
        return $this->state(new Sequence(fn ($sequence) =>['post_id' => Post::all()->random()]));
    }
}
