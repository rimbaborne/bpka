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
        $user1 = User::create(
            [
            'name' => 'Admin Ari',
            'email' => 'arin@berlian-bpka.com',
            'password' => bcrypt('17agustus'), // Ganti dengan password yang diinginkan
            ]
        );
        $user2 = User::create(
            [
                'name' => 'Admin Dedy',
                'email' => 'dedy@berlian-bpka.com',
                'password' => bcrypt('17agustus'), // Ganti dengan password yang diinginkan
            ],
        );
        $user3 = User::create(
            [
                'name' => 'Bos',
                'email' => 'bos@berlian-bpka.com',
                'password' => bcrypt('17agustus'), // Ganti dengan password yang diinginkan
            ],
        );


        // Assign role admin ke user
        $user1->assignRole($superadminRole);
        $user2->assignRole($superadminRole);
        $user3->assignRole($superadminRole);
    }
}
