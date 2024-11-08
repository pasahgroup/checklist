<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDynamicIndUpdatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dynamic_ind_updates', function (Blueprint $table) {
            $table->bigIncrements('id');
         $table->integer('index_id')->nullable();

          $table->integer('property_id')->nullable();
          $table->integer('asset_id')->nullable();

          $table->integer('metaname_id')->nullable();
          $table->integer('indicator_id')->nullable();
         $table->integer('answer_id')->nullable();
          $table->integer('opt_answer_id')->nullable();
          
          $table->string('answer_value',150)->nullable();
         $table->integer('value')->default(0);
          $table->integer('user_id')->unsigned();
            $table->string('description',700)->nullable();
           $table->string('image',120)->nullable();
            $table->string('status')->default('Active');
             $table->date('datex')->nullable();
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
        Schema::dropIfExists('dynamic_ind_updates');
    }
}
