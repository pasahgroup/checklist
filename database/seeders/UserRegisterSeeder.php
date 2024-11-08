<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserRegisterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('users')->insert([
            [
                'name' => 'Super Admin',
                'property_id' =>1,
                'department_id' =>1,
                // 'user_role' => 'Administrator',
                'email' => 'superadmin@pasah.net',
                'email_verified_at' => now(),
                'password' => Hash::make('12345678'),
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
