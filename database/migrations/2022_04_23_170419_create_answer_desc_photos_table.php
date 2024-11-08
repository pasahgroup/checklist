<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnswerDescPhotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('answer_desc_photos', function (Blueprint $table) {
         $table->bigIncrements('id');

          $table->integer('property_id')->nullable();
          $table->integer('asset_id')->nullable();
            $table->integer('metaname_id')->nullable();
          $table->integer('indicator_id')->nullable();
            $table->integer('answer_id')->nullable();
              $table->string('section',32)->nullable();
            $table->string('description',700)->nullable();
           $table->string('image',120)->nullable();
           $table->integer('user_id')->unsigned();
            $table->date('datex')->nullable();
            $table->boolean('action')->default(0);
            $table->string('status')->default('Active');
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
        Schema::dropIfExists('answer_desc_photos');
    }
}
