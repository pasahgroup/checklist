<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
class DatatypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
              DB::table('datatypes')->insert([
            [
                'datatype_name' => 'Input',
                'datatype' =>'input',
                'status' =>'Inactive',
                'user_id' =>auth()->id(),
                'created_at' => now(),
                'updated_at' => now()
            ],
              [
                'datatype_name' => 'Checklist',
                'datatype' =>'checkbox',
                'status' =>'Inactive',
                'user_id' =>auth()->id(),
                'created_at' => now(),
                'updated_at' => now()
            ],
              [
                'datatype_name' => 'Selection/Optional',
                'datatype' =>'radio',
                'status' =>'Inactive',
                'user_id' =>auth()->id(),
                'created_at' => now(),
                'updated_at' => now()
            ],
              [
                'datatype_name' => 'Number',
                'datatype' =>'number',
                'status' =>'Inactive',
                'user_id' =>auth()->id(),
                'created_at' => now(),
                'updated_at' => now()
            ],
              [            

                'datatype_name' => 'Description',
                'datatype' =>'textarea',
                'status' =>'Inactive',
                'user_id' =>auth()->id(),
                'created_at' => now(),
                'updated_at' => now()
            ]
             
        ]);
    }
}
