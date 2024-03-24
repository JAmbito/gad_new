<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonnelVoluntaryWorksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personnel_voluntary_works', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('personnel_information_id');
            $table->string('voluntary_name')->nullable();
            $table->string('voluntary_address')->nullable();
            $table->string('voluntary_from')->nullable();
            $table->string('voluntary_to')->nullable();
            $table->string('voluntary_hours')->nullable();
            $table->string('voluntary_position')->nullable();
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
        Schema::dropIfExists('personnel_voluntary_works');
    }
}
