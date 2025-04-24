<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $superadmin = User::create([
            'name' => 'superadmin',
            'username' => 'superadmin',
            'email' => 'superadmin@gmail.com',
            'password' => bcrypt('password'),
            'role' => 'superadmin',
        ]);
        $superadmin->assignRole('superadmin');

        // $admin_satu = User::create([
        //     'name' => 'admin_satu',
        //     'username' => 'admin_satu',
        //     'email' => 'cvyadinkarya@gmail.com',
        //     'password' => bcrypt('cvyadin'),
        //     'role' => 'admin',
        // ]);
        // $admin_satu->assignRole('admin');
    }
}
