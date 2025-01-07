<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
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
                'email' => 'superadmin@hakunamatatabookings.co.tz',
                'email_verified_at' => now(),
                'password' => Hash::make('12345678'),
                'created_at' => now(),
                'updated_at' => now()
            ],
              [
                'name' => 'General Admin',
                'property_id' =>1,
                'department_id' =>1,
                // 'user_role' => 'Administrator',
                'email' => 'generaladmin@hakunamatatabookings.co.tz',
                'email_verified_at' => now(),
                'password' => Hash::make('12345678'),
                'created_at' => now(),
                'updated_at' => now()
            ],
              [
                'name' => 'Admin',
                'property_id' =>1,
                'department_id' =>1,
                // 'user_role' => 'Administrator',
                'email' => 'admin@hakunamatatabookings.co.tz',
                'email_verified_at' => now(),
                'password' => Hash::make('12345678'),
                'created_at' => now(),
                'updated_at' => now()
            ],
              [
                'name' => 'General Manager',
                'property_id' =>1,
                'department_id' =>1,
                // 'user_role' => 'Administrator',
                'email' => 'generalmanager@hakunamatatabookings.co.tz',
                'email_verified_at' => now(),
                'password' => Hash::make('12345678'),
                'created_at' => now(),
                'updated_at' => now()
            ],
              [
                'name' => 'Manager',
                'property_id' =>1,
                'department_id' =>1,
                // 'user_role' => 'Administrator',
                'email' => 'manager@hakunamatatabookings.co.tz',
                'email_verified_at' => now(),
                'password' => Hash::make('12345678'),
                'created_at' => now(),
                'updated_at' => now()
            ],
              [
                'name' => 'Account',
                'property_id' =>1,
                'department_id' =>1,
                // 'user_role' => 'Administrator',
                'email' => 'account@hakunamatatabookings.co.tz',
                'email_verified_at' => now(),
                'password' => Hash::make('12345678'),
                'created_at' => now(),
                'updated_at' => now()
            ],
              [
                'name' => 'Store',
                'property_id' =>1,
                'department_id' =>1,
                // 'user_role' => 'Administrator',
                'email' => 'store@hakunamatatabookings.co.tz',
                'email_verified_at' => now(),
                'password' => Hash::make('12345678'),
                'created_at' => now(),
                'updated_at' => now()
            ],
              [
                'name' => 'HouseKeeper',
                'property_id' =>1,
                'department_id' =>1,
                // 'user_role' => 'Administrator',
                'email' => 'housekeeper@hakunamatatabookings.co.tz',
                'email_verified_at' => now(),
                'password' => Hash::make('12345678'),
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
