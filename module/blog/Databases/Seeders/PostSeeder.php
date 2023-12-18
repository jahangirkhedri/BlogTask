<?php

namespace Module\blog\Databases\Seeders;

use Illuminate\Database\Seeder;
use Module\blog\Models\Post;
use Module\user\Models\User;
use Faker\Factory as Faker;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if(!Post::count()){
            $faker = Faker::create();
            $user = User::first();
            for($i=0;$i<8;$i++){
                Post::create([
                    "user_id" => $user->id,
                    'title' => $faker->realText(100),
                    'content' => $faker->realText
                ]);
            }
        }

    }
}
