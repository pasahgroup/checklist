<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDbconnectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dbconnects', function (Blueprint $table) {            
          $table->bigIncrements('id');
          $table->integer('company_id')->nullable();
          $table->string('db_name')->nullable();
          $table->string('db_username')->nullable();
          $table->string('pwd')->nullable();
          $table->string('host')->nullable();
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
        Schema::dropIfExists('dbconnects');
    }
}
