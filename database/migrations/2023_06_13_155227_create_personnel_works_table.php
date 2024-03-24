<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonnelWorksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personnel_works', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('personnel_information_id');
            $table->string('work_from')->nullable();
            $table->string('work_to')->nullable();
            $table->string('work_position')->nullable();
            $table->string('work_agency')->nullable();
            $table->string('work_salary')->nullable();
            $table->string('work_pay_grade')->nullable();
            $table->string('work_appointment')->nullable();
            $table->string('work_gov_service')->nullable();
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
        Schema::dropIfExists('personnel_works');
    }
}
