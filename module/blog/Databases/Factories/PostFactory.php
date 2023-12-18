<?php

namespace Module\blog\Databases\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Module\blog\Models\Post;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Model>
 */
class PostFactory extends Factory
{
    protected $model = Post::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "title" => $this->faker->realText(100),
            "content" => $this->faker->realText,
        ];
    }


    public function draft()
    {
        return $this->state(function (){
            return ['status' => 0];
        });
    }
    public function published()
    {
        return $this->state(function (){
            return ['status' => 1];
        });
    }

    public function user($userId)
    {
        return $this->state(function ()use($userId){
            return ['user_id' => $userId];
        });
    }
}
