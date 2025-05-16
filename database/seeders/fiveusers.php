<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class fiveusers extends Seeder
{
    /**
     * Run the database seeds.
     */
public function run(): void
    {
        $users = [
           [
    'id' => Str::uuid(),
    'first_name' => 'Noah',
    'last_name' => 'Reed',
    'sex' => 'Male',
    'birthday' => '1994-12-05',
    'username' => 'noahreeds',
    'email' => 'noah.reed@itelec3.test',
    'password' => Hash::make('password123'),
    'agreed_to_terms' => true,
    'user_type' => 'Customer',
    'created_at' => now(),
    'updated_at' => now(),
    'email_verified_at' => null,
    'verification_token' => Str::random(32),
],
[
    'id' => Str::uuid(),
    'first_name' => 'Isabella',
    'last_name' => 'Nguyen',
    'sex' => 'Female',
    'birthday' => '1996-01-28',
    'username' => 'isabellan',
    'email' => 'isabella.nguyen@itelec3.test',
    'password' => Hash::make('password123'),
    'agreed_to_terms' => true,
    'user_type' => 'Admin',
    'created_at' => now(),
    'updated_at' => now(),
    'email_verified_at' => null,
    'verification_token' => Str::random(32),
],
[
    'id' => Str::uuid(),
    'first_name' => 'Ethan',
    'last_name' => 'Ramirez',
    'sex' => 'Male',
    'birthday' => '1990-05-19',
    'username' => 'ethanr',
    'email' => 'ethan.ramirez@itelec3.test',
    'password' => Hash::make('password123'),
    'agreed_to_terms' => true,
    'user_type' => 'Customer',
    'created_at' => now(),
    'updated_at' => now(),
    'email_verified_at' => null,
    'verification_token' => Str::random(32),
],
[
    'id' => Str::uuid(),
    'first_name' => 'Mia',
    'last_name' => 'Carter',
    'sex' => 'Female',
    'birthday' => '1997-04-02',
    'username' => 'miacarter',
    'email' => 'mia.carter@itelec3.test',
    'password' => Hash::make('password123'),
    'agreed_to_terms' => true,
    'user_type' => 'Customer',
    'created_at' => now(),
    'updated_at' => now(),
    'email_verified_at' => null,
    'verification_token' => Str::random(32),
],
[
    'id' => Str::uuid(),
    'first_name' => 'James',
    'last_name' => 'Gonzales',
    'sex' => 'Male',
    'birthday' => '1986-07-14',
    'username' => 'jamesg',
    'email' => 'james.gonzales@itelec3.test',
    'password' => Hash::make('password123'),
    'agreed_to_terms' => true,
    'user_type' => 'Admin',
    'created_at' => now(),
    'updated_at' => now(),
    'email_verified_at' => null,
    'verification_token' => Str::random(32),
],

        ];

        DB::table('usersinfo')->insert($users);
    }
}
