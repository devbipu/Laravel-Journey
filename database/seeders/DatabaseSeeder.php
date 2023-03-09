<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Permission;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(10)->create();
        // \App\Models\Role::factory(4)->create();

        \App\Models\User::factory()->create([
            'name' => 'Biplob Shaha',
            'email' => 'devbipu@gmail.com',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', //password
        ]);



        $roles = ['Admin', 'Editor', 'Author', 'Visitor'];
        foreach ($roles as $role) {
            \App\Models\Role::create([
                'name' => $role,
                'slug'  => Str::slug($role),
            ]);
        }
        Permission::truncate();

        Permission::create([
            'name'  => 'Post View',
            'slug'      => 'post-view',
            'status'      => 1,
        ]);
        Permission::create([
            'name'  => 'Post Create',
            'slug'      => 'post-create',
            'status'      => 1,
        ]);
        Permission::create([
            'name'  => 'Post Edit',
            'slug'      => 'post-edit',
            'status'      => 1,  
        ]);
        Permission::create([
            'name'  => 'Post Delete',
            'slug'      => 'post-delete',
            'status'      => 1, 
        ]);

    }
}
