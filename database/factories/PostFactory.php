<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\Sequence;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(3),
            'content' => $this->faker->paragraph(10),
            'state' => Post::randomState(),
            'user_id' => User::factory()->admin(),
        ];
    }

    public function draft(){
        return $this->state(function (array $attributes){
            return [
                'state' => 'draft',
            ];
        });
    }

    public function published(){
        return $this->state(function (array $attributes){
            return [
                'state' => 'published',
            ];
        });
    }

    public function archived(){
        return $this->state(function (array $attributes){
            return [
                'state' => 'archived',
            ];
        });
    }

    public function forExistingAdmin(){
        return $this->state(new Sequence(fn ($sequence) =>['user_id' => User::Admin()->get()->random()]));
    }
}
