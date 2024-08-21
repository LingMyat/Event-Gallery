<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DemoMemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
            [
                'name'              => 'Demo Member',
                'email'             => 'member1@test.com',
                'email_verified_at' => now(),
                'password'          => Hash::make('password'),
                'role'              => 'member'
            ],
            [
                'name'              => 'Demo Member-B',
                'email'             => 'member2@test.com',
                'email_verified_at' => now(),
                'password'          => Hash::make('password'),
                'role'              => 'member'
            ],
        ]);
    }
}
