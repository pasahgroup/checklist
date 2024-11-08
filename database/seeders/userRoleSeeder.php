<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class userRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_roles')->insert([
            [
                'sys_user_id' =>1,
                'role_id' =>1,
                'status' =>'Active',
                'user_id' =>1,
                'created_at' => now(),
                'updated_at' => now()
            ],
              [
                'sys_user_id' =>2,
                'role_id' =>2,
                'status' =>'Active',
                'user_id' =>2,
                'created_at' => now(),
                'updated_at' => now()
            ],
              [
                'sys_user_id' =>3,
                'role_id' =>3,
                'status' =>'Active',
                'user_id' =>3,
                'created_at' => now(),
                'updated_at' => now()
            ],
              [
             'sys_user_id' =>4,
                'role_id' =>4,
                'status' =>'Active',
                'user_id' =>4,
                'created_at' => now(),
                'updated_at' => now()
            ],
              [
               'sys_user_id' =>5,
                'role_id' =>5,
                'status' =>'Active',
                'user_id' =>5,
                'created_at' => now(),
                'updated_at' => now()
            ],
              [
                'sys_user_id' =>6,
                'role_id' =>6,
                'status' =>'Active',
                'user_id' =>6,
                'created_at' => now(),
                'updated_at' => now()
            ],
              [
                'sys_user_id' =>7,
                'role_id' =>7,
                'status' =>'Active',
                'user_id' =>7,
                'created_at' => now(),
                'updated_at' => now()
            ],
             [
                'sys_user_id' =>8,
                'role_id' =>8,
                'status' =>'Active',
                'user_id' =>8,
                'created_at' => now(),
                'updated_at' => now()
            ] 
        ]);
    }
}
