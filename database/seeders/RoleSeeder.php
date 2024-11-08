<?php

namespace Database\Seeders;

// use Illuminate\Database\Seeder;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            [
                'name' => 'SuperAdmin',
                'guard_name' =>'web',
                'status' =>'Active',
                'created_at' => now(),
                'updated_at' => now()
            ],
             [
                'name' => 'GeneralAdmin',
                'guard_name' =>'web',
                'status' =>'Active',
                'created_at' => now(),
                'updated_at' => now()
            ],
             [
                'name' => 'Admin',
                'guard_name' =>'web',
                'status' =>'Active',
                'created_at' => now(),
                'updated_at' => now()
            ],
             [
                'name' => 'GeneralManager',
                'guard_name' =>'web',
                'status' =>'Active',
                'created_at' => now(),
                'updated_at' => now()
            ],
             [
                'name' => 'Manager',
                'guard_name' =>'web',
                'status' =>'Active',
                'created_at' => now(),
                'updated_at' => now()
            ],
             [
                'name' => 'Account',
                'guard_name' =>'web',
                'status' =>'Active',
                'created_at' => now(),
                'updated_at' => now()
            ],
             [
                'name' => 'Store',
                'guard_name' =>'web',
                'status' =>'Active',
                'created_at' => now(),
                'updated_at' => now()
            ],
             [
                'name' => 'User',
                'guard_name' =>'web',
                'status' =>'Active',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
               'name' => 'No role',
               'guard_name' =>'web',
               'status' =>'Active',
               'created_at' => now(),
               'updated_at' => now()
           ]

        ]);
    }
}
