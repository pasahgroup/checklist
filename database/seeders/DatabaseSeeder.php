<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    // public function run()
    // {
    //     App\Models\User::factory(10)->create();
    // }

public function run()
{
    $this->call([
        UserSeeder::class,
        RoleSeeder::class,
       DepartmentSeeder::class,
    ModelRoleSeeder::class,
    DatatypeSeeder::class,
    MetadataSeeder::class,
    userRoleSeeder::class,
    MetanameSeeder::class,
     keyIndicatorsSeeder::class,
    ]);
}

}
