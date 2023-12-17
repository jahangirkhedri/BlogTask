<?php

namespace Module\user\Databases\Seeders;

use Illuminate\Database\Seeder;
use Module\acl\Model\Role;
use Module\user\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'name' => "author",
            "email" => "author@gmail.com",
            "password" => bcrypt(123456)
        ]);
        $userRole = Role::whereSlug('author')->first();
        $user->roles()->attach([$userRole->id]);

        $admin = User::create([
            'name' => "admin",
            "email" => "admin@gmail.com",
            "password" => bcrypt(123456)
        ]);
        $adminRole = Role::whereSlug('admin')->first();
        $admin->roles()->attach([$adminRole->id]);


    }
}
