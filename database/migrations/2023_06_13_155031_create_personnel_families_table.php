<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonnelFamiliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personnel_families', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('personnel_information_id');
            $table->string('spouse_firstname')->nullable();
            $table->string('spouse_middlename')->nullable();
            $table->string('spouse_lastname')->nullable();
            $table->string('spouse_extension')->nullable();
            $table->string('spouse_occupation')->nullable();
            $table->string('spouse_business_name')->nullable();
            $table->string('spouse_business_address')->nullable();
            $table->string('spouse_tel_no')->nullable();
            $table->string('father_firstname')->nullable();
            $table->string('father_middlename')->nullable();
            $table->string('father_lastname')->nullable();
            $table->string('father_extension')->nullable();
            $table->string('mother_maiden_name')->nullable();
            $table->string('mother_firstname')->nullable();
            $table->string('mother_middlename')->nullable();
            $table->string('mother_lastname')->nullable();
            $table->string('mother_extension')->nullable();
            $table->timestamps();

            $table->foreign('personnel_information_id')
                ->references('id')
                ->on('personnels');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('personnel_families');
    }
}
