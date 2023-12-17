<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Module\acl\Databases\Seeders\RoleSeeder;
use Module\acl\Model\Role;
use Module\blog\Databases\Seeders\PostSeeder;
use Module\blog\Models\Post;
use Module\user\Databases\Seeders\UserSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        resolve(RoleSeeder::class)->run();
        resolve(UserSeeder::class)->run();
        resolve(PostSeeder::class)->run();

    }
}
