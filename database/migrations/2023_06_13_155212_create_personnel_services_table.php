<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonnelServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personnel_services', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('personnel_information_id');
            $table->string('service_career')->nullable();
            $table->string('service_rating')->nullable();
            $table->string('service_exam_date')->nullable();
            $table->string('service_exam_place')->nullable();
            $table->string('service_license')->nullable();
            $table->string('service_license_date')->nullable();
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
        Schema::dropIfExists('personnel_services');
    }
}
