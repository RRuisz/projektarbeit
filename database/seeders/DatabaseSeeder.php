<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        DB::table('departments')->insert([
            'name' => 'Service',
       ]);
       DB::table('departments')->insert([
        'name' => 'Rezeption',
        ]);
        DB::table('departments')->insert([
            'name' => 'Küche',
       ]);
       DB::table('departments')->insert([
        'name' => 'Technik',
       ]);
       DB::table('roles')->insert([
        'name' => 'Admin',
       ]);
       DB::table('roles')->insert([
        'name' => 'Abteilungsleiter',
       ]);
       DB::table('roles')->insert([
        'name' => 'Mitarbeiter',
       ]);

       DB::table('users')->insert([
             'name' => 'admin',
             'email' => 'admin@gmail.com',
             'birthdate' => '1998-03-03',
             'password' => Hash::make('admin123'),
             'role_id' => 1,
             'department_id' => 1,
        ]);
        DB::table('users')->insert([
            'name' => 'mitarbeiter',
            'email' => 'mitarbeiter@gmail.com',
            'birthdate' => '1998-03-03',
            'password' => Hash::make('mitarbeiter123'),
            'role_id' => 3,
            'department_id' => 2,
       ]);

    }
}
