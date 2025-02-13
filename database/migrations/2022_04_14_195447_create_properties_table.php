<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->bigIncrements('id');
             $table->integer('company_id')->nullable();
                $table->integer('company_code')->nullable();
            $table->string('property_name')->nullable();
            $table->string('property_category')->nullable();
            $table->integer('property_rank')->unsigned();
            $table->integer('room_no')->unsigned();
            $table->string('location_name')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('property_description')->nullable();
            $table->string('photo')->nullable();
            $table->string('level',32)->nullable();
            $table->string('status')->default('Active');
            $table->integer('user_id')->unsigned();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('properties');
    }
}
