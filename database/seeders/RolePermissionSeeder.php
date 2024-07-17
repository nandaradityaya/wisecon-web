<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        $ownerRole = Role::create([
             'name' => 'owner'
        ]);

        $admin = Role::create([
            'name' => 'admin'
        ]);

        $userOwner = User::create([
            'name' => 'Nanda Raditya',
            'avatar' => 'assets/img/nanda.jpg',
            'email' => 'nandaraditya80@gmail.com',
            'password' => bcrypt('20000905')
        ]);

        $userOwner->assignRole($ownerRole); 
    }
}
