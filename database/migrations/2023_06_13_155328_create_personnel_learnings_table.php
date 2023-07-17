<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonnelLearningsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personnel_learnings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('personnel_id');
            $table->string('learning_training')->nullable();
            $table->string('learning_from')->nullable();
            $table->string('learning_to')->nullable();
            $table->string('learning_hours')->nullable();
            $table->string('learning_id_type')->nullable();
            $table->string('learning_sponsored')->nullable();
            $table->timestamps();

            $table->foreign('personnel_id')
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
        Schema::dropIfExists('personnel_learnings');
    }
}
