<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class MetadataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('metadata')->insert([
            [
                'metadata_name' => 'Name',
                'datatype' =>'input',
                'status' =>'Active',
                 'statusx' => 'Inactive',
                'user_id' =>auth()->id(),
                'created_at' => now(),
                'updated_at' => now()
            ],
              [
               'metadata_name' => 'Brand Name',
                'datatype' =>'input',
                'status' =>'Active',
                 'statusx' => 'Inactive',
                'user_id' =>auth()->id(),
                'created_at' => now(),
                'updated_at' => now()
            ],
          
              [
                 'metadata_name' => 'Version',
                'datatype' =>'input',
                'status' =>'Active',
                 'statusx' => 'Inactive',
                'user_id' =>auth()->id(),
                'created_at' => now(),
                'updated_at' => now()
            ],
              [
               'metadata_name' => 'Barcode',
                'datatype' =>'input',
                'status' =>'Active',
                 'statusx' => 'Inactive',
                'user_id' =>auth()->id(),
                'created_at' => now(),
                'updated_at' => now()
            ],
              [
                 'metadata_name' => 'Serial Number',
                'datatype' =>'input',
                'status' =>'Active',
                 'statusx' => 'Inactive',
                'user_id' =>auth()->id(),
                'created_at' => now(),
                'updated_at' => now()
            ],
              [
             'metadata_name' => 'Tag Number',
                'datatype' =>'input',
                'status' =>'Active',
                 'statusx' => 'Inactive',
                'user_id' =>auth()->id(),
                'created_at' => now(),
                'updated_at' => now()
            ],
              [
               'metadata_name' => 'Type',
                'datatype' =>'input',
                'status' =>'Active',
                 'statusx' => 'Inactive',
                'user_id' =>auth()->id(),
                'created_at' => now(),
                'updated_at' => now()
            ],
              [
               'metadata_name' => 'Description',
                'datatype' =>'textarea',
                'status' =>'Active',
                 'statusx' => 'Inactive',
                'user_id' =>auth()->id(),
                'created_at' => now(),
                'updated_at' => now()
            ],
              [
               'metadata_name' => 'Location',
                'datatype' =>'input',
                'status' =>'Active',
                 'statusx' => 'Inactive',
                'user_id' =>auth()->id(),
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
