<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PropertySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('properties')->insert([
          [
              'id' =>1,
              'property_name' =>"Manyara best view",
              'property_category' =>'Hotel',
              'property_rank' =>4,
              'room_no'=>15,
              'location_name'=>"Manyara",
              'email'=>"superadmin@hakunamatatabookings.co.tz",
              'status'=>"Active",
              'created_at' => now(),
              'updated_at' => now()
          ]
      ]);
    }
}
