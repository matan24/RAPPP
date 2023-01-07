<?php

namespace Database\Seeders;

use App\Models\User;

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([

            'username' => 'admin',
            'name' => 'Admin1',
            'password' => bcrypt('april0484'),
            'email' => 'rapp123@gmail.com',
        ]);

        $admin->assignRole('admin');

    }
}
