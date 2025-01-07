<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateManagersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('managers', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->integer('property_id')->nullable();
          $table->integer('metaname_id')->nullable();
          $table->integer('indicator_id')->nullable();
          $table->integer('answer_id')->nullable();
          $table->integer('opt_answer_id')->nullable();
          $table->string('answer')->nullable();
          $table->string('manager_checklist',24)->nullable();

           $table->date('cleared_date')->nullable();
           $table->integer('asset_id')->nullable();
            $table->string('section',24)->nullable();
            $table->string('photo')->nullable();
             $table->string('description',420)->nullable();
            $table->string('status')->default('Active');
            $table->boolean('action')->default(0);
            $table->integer('user_id')->unsigned();
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
        Schema::dropIfExists('managers');
    }
}
