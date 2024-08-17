<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Membuat Role Admin
        $superadminRole = Role::create(['name' => 'super-admin']);

        $adminRole = Role::create(['name' => 'admin']);

        // Membuat Role Humas
        $humasRole = Role::create(['name' => 'humas']);

        // Membuat User Admin
        $adminUser = User::create([
            'name' => 'Admin User',
            'email' => 'admin@admin.com',
            'password' => bcrypt('qweqweqwe'), // Ganti dengan password yang diinginkan
        ]);

        // Assign role admin ke user
        $adminUser->assignRole($superadminRole);
    }
}
