<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonnelQuestionairesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personnel_questionaires', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('personnel_information_id');
            $table->string('question_34a')->nullable();
            $table->string('question_34b')->nullable();
            $table->string('question_34b_detail')->nullable();
            $table->string('question_35a')->nullable();
            $table->string('question_35a_detail')->nullable();
            $table->string('question_35b')->nullable();
            $table->string('question_35b_detail')->nullable();
            $table->string('question_36a')->nullable();
            $table->string('question_36a_detail')->nullable();
            $table->string('question_37a')->nullable();
            $table->string('question_37a_detail')->nullable();
            $table->string('question_38a')->nullable();
            $table->string('question_38a_detail')->nullable();
            $table->string('question_38b')->nullable();
            $table->string('question_38b_detail')->nullable();
            $table->string('question_39a')->nullable();
            $table->string('question_39a_detail')->nullable();
            $table->string('question_40a')->nullable();
            $table->string('question_40a_detail')->nullable();
            $table->string('question_40b')->nullable();
            $table->string('question_40b_detail')->nullable();
            $table->string('question_40c')->nullable();
            $table->string('question_40c_detail')->nullable();
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
        Schema::dropIfExists('personnel_questionaires');
    }
}
