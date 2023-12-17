<?php

namespace Module\acl\Databases\Seeders;

use Illuminate\Database\Seeder;
use Module\acl\Model\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create([
            'slug' => Role::ADMIN_ROLE,
            'title' => 'admin'
        ]);
        Role::create([
            'slug' => Role::AUTHOR_ROLE,
            'title' => 'author'
        ]);


    }
}
