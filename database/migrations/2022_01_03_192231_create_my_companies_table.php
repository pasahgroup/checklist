<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMyCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('my_companies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('company_name')->nullable();
            $table->string('tin')->nullable();
            $table->string('vrn')->nullable();
            $table->string('logo')->nullable();
            $table->string('address')->nullable();

            $table->string('first_name',32)->nullable();
            $table->string('last_name',32)->nullable();

            $table->integer('phone_number')->unsigned();
             $table->string('email',48)->nullable();
            $table->string('status')->nullable();
            $table->date('user_id')->nullable();
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
        Schema::dropIfExists('my_companies');
    }
}
