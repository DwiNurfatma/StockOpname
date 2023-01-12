<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $super_admin = User::create([
            'name' => 'Super Admin',
            'email' => 'superadmin@gmail.com',
            'password' => bcrypt('12345678')
        ]);
        $super_admin->assignRole('super_admin');

        $admin1 = User::create([
            'name' => 'Admin1',
            'email' => 'admin1@gmail.com',
            'password' => bcrypt('12345678')
        ]);
        $admin1->assignRole('admin');

        $admin2 = User::create([
            'name' => 'Admin2',
            'email' => 'admin2@gmail.com',
            'password' => bcrypt('12345678')
        ]);
        $admin2->assignRole('admin');

        $admin3 = User::create([
            'name' => 'Admin3',
            'email' => 'admin3@gmail.com',
            'password' => bcrypt('12345678')
        ]);
        $admin3->assignRole('admin');

        $admin4 = User::create([
            'name' => 'Admin4',
            'email' => 'admin4@gmail.com',
            'password' => bcrypt('12345678')
        ]);
        $admin4->assignRole('admin');

        $admin5 = User::create([
            'name' => 'Admin5',
            'email' => 'admin5@gmail.com',
            'password' => bcrypt('12345678')
        ]);
        $admin5->assignRole('admin');
    }
}
