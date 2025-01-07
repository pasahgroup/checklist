<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assets', function (Blueprint $table) {
       $table->bigIncrements('id');
         $table->string('property_id')->nullable();
          $table->string('location_id')->nullable();
           $table->string('metaname_id')->nullable();
            $table->string('asset_name')->nullable();
              $table->string('asset_type')->nullable();

                 $table->string('asset_brand',32)->nullable();
                    $table->string('asset_location',32)->nullable();
                       $table->string('asset_version',32)->nullable();

            $table->string('asset_serial_no')->nullable();
            $table->string('asset_barcode')->nullable();
             $table->string('asset_tag_no')->nullable();
              $table->string('asset_description')->nullable();
               $table->string('photo')->nullable();
            $table->string('status')->default('Active');
              $table->integer('time_show')->default(0);
                $table->integer('asset_show')->default(1);
                  $table->time('extra_time');
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
        Schema::dropIfExists('assets');
    }
}
