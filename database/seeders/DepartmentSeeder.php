<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          DB::table('departments')->insert([
            [
                'department_name' => 'Hr and Admin',
                'unit_name' =>'Hr and Admin',
                'status' =>'Active',
                'users' => 0,
                'user_id' =>1,
                'created_at' => now(),
                'updated_at' => now()
            ],
              [
                'department_name' => 'Hoteliar',
                'unit_name' =>'Hoteliar',
                'status' =>'Active',
                'users' => 0,
                'user_id' =>1,
                'created_at' => now(),
                'updated_at' => now()
            ],
              [
                'department_name' => 'Account',
                'unit_name' =>'Account',
                'status' =>'Active',
                'users' => 0,
                'user_id' =>1,
                'created_at' => now(),
                'updated_at' => now()
            ],
              [
                'department_name' => 'Store',
                'unit_name' =>'Store',
                'status' =>'Active',
                'users' => 0,
                'user_id' =>1,
                'created_at' => now(),
                'updated_at' => now()
            ],
              [
              'department_name' => 'House Keeping',
                'unit_name' =>'House Keeping',
                'status' =>'Active',
                'users' => 0,
                'user_id' =>1,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
