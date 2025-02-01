<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $administratorRole = Role::create(['name' => 'administrator']);
        $userRole = Role::create(['name' => 'user']);

        $createPostsPermission = Permission::create(['name' => 'create posts']);
        $editPostsPermission = Permission::create(['name' => 'edit posts']);
        $deletePostsPermission = Permission::create(['name' => 'delete posts']);
        $viewPostsPermission = Permission::create(['name' => 'view posts']);

        $administratorRole->givePermissionTo([
            $createPostsPermission,
            $editPostsPermission,
            $deletePostsPermission,
            $viewPostsPermission,
        ]);

        $userRole->givePermissionTo([
            $viewPostsPermission,
        ]);
    }
}
