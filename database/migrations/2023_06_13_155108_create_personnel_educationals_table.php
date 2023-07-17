<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonnelEducationalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personnel_educationals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('personnel_id');
            $table->string('education_level')->nullable();
            $table->string('educational_school_name')->nullable();
            $table->string('educational_course')->nullable();
            $table->string('educational_from')->nullable();
            $table->string('educational_to')->nullable();
            $table->string('educational_units_earned')->nullable();
            $table->string('educational_year_graduated')->nullable();
            $table->string('educational_scholarship_class')->nullable();
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
        Schema::dropIfExists('personnel_educationals');
    }
}
