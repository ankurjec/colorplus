<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // DB::table('users')->insert([
        //     'name' => 'Viewer',
        //     'email' => 'zicytecuc@mailinator.com',
        //     'password' => bcrypt('VRHYM0I'),
        // ]);


        DB::table('users')->insert([
            'name' => 'ankur',
            'email' => 'ankurgogoi917@gmail.com',
            'password' => bcrypt('Ankur@1234'),
        ]);

    }
}
