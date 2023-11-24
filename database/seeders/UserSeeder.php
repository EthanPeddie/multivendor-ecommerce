<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
                //admin
                DB::table('users')->insert([
                    'name' => 'admin',
                    'username' => 'Admin',
                    'email' => 'admin@gmail.com',
                    'password' => Hash::make('admin'),
                    'role' => 'admin',
                    'status' => 'active'
                ]);

                //agent
                DB::table('users')->insert([
                    'name' => 'agent',
                    'username' => 'Agent',
                    'email' => 'agent@gmail.com',
                    'password' => Hash::make('agent'),
                    'role' => 'agent',
                    'status' => 'active'
                ]);
                //uer
                DB::table('users')->insert([
                    'name' => 'user',
                    'username' => 'User',
                    'email' => 'user@gmail.com',
                    'password' => Hash::make('user'),
                    'role' => 'user',
                    'status' => 'active'
                ]);


    }
}
