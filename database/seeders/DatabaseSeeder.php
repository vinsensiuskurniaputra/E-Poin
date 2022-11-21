<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Admin;
use App\Models\Student;
use App\Models\Kategori;
use App\Models\TheClass;
use Illuminate\Database\Seeder;
use App\Models\DaftarPelanggaran;

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
        
        // Kategori::factory(10)->create();

        // TheClass::factory(5)->create();

        // Student::factory(10)->create();
        
        // User::factory(15)->create();

        User::create([
            'role_id' => '1',
            'username' => 'AdminKu',
            'password' => Hash::make('12345'),
        ]);

        // DaftarPelanggaran::factory(10)->create();
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
