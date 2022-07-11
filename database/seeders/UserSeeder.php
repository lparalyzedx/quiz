<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   User::truncate();

        User::create([
            'name' => 'Cafer Güvenc',
            'email' => 'caferguvenc@gmail.com',
            'type' => 'admin',
            'email_verified_at' => now(),
            'password' => bcrypt('0852ca'),
            'remember_token' => Str::random(10),
          ]);

        User::factory(5)->create();
    }
}
