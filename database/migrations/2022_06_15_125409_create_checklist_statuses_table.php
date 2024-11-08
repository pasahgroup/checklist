<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChecklistStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('checklist_statuses', function (Blueprint $table) {
            $table->bigIncrements('id');
         $table->string('sys_user_id')->nullable();
          $table->string('site_id')->nullable();
           $table->integer('grade_id')->nullable();
            $table->boolean('grade')->nullable();
            $table->string('status')->default('False');
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
        Schema::dropIfExists('checklist_statuses');
    }
}
