<?php

namespace Database\Seeders;

<<<<<<< HEAD
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
=======
>>>>>>> 3565232c3feebc5dea729802e15a161d096a2c8c
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
<<<<<<< HEAD
        // User::factory(10)->create();
        $this->call(UsertableSeeder::class);
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
=======
        $this->call([
            UsersTableSeeder::class,
>>>>>>> 3565232c3feebc5dea729802e15a161d096a2c8c
        ]);
    }
}
