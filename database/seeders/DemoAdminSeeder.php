<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DemoAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'              => 'Demo Admin',
            'email'             => 'admin@admin.com',
            'email_verified_at' => now(),
            'password'          => 'password',
            'role'              => 'admin'
        ]);
    }
}
