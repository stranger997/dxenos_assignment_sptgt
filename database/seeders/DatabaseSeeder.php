<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'User1',
            'email' => 'user1@example.com',
        ]);

        \App\Models\User::factory()->create([
            'name' => 'User2',
            'email' => 'user2@example.com',
        ]);

        $this->call(
            [
                ListingSeeder::class,
            ]
        );
    }
}
