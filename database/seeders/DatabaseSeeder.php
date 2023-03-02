<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
// use App\Supports\Database\TruncateTable;
use App\Models\Image;

class DatabaseSeeder extends Seeder
{
    // use TruncateTable; 

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // $this->forgenKeyCheckDisable();
        // $this->truncate('images');
        // Image::factory(10)->create();
        // $this->forgenKeyCheckEnable();


        $this->call([
            AdminSeeder::class,
        ]);
    }
}
