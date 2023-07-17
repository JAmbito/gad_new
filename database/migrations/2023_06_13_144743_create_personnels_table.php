<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonnelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personnels', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('firstname');
            $table->string('middlename')->nullable();
            $table->string('lastname');
            $table->string('extension')->nullable();
            $table->string('birthday')->nullable();
            $table->string('birth_place')->nullable();
            $table->unsignedBigInteger('designation_id')->nullable();
            $table->unsignedBigInteger('department_id')->nullable();
            $table->unsignedBigInteger('academic_rank_id')->nullable();
            $table->unsignedBigInteger('administrative_rank_id')->nullable();
            $table->string('employee_status')->nullable();
            $table->unsignedBigInteger('campus_id')->nullable();
            $table->string('sex')->nullable();
            $table->string('civil_status')->nullable();
            $table->string('height')->nullable();
            $table->string('weight')->nullable();
            $table->string('blood')->nullable();
            $table->string('gsis')->nullable();
            $table->string('pagibig')->nullable();
            $table->string('philhealth')->nullable();
            $table->string('sss')->nullable();
            $table->string('tin')->nullable();
            $table->string('id_no')->nullable();
            $table->string('citizenship')->nullable();
            $table->string('by_birth')->nullable();
            $table->string('dual_indication')->nullable();
            $table->string('residential_lot_no')->nullable();
            $table->string('residential_street')->nullable();
            $table->string('residential_subdivision')->nullable();
            $table->string('residential_barangay')->nullable();
            $table->string('residential_city')->nullable();
            $table->string('residential_province')->nullable();
            $table->string('residential_zipcode')->nullable();
            $table->string('permanent_lot_no')->nullable();
            $table->string('permanent_street')->nullable();
            $table->string('permanent_subdivision')->nullable();
            $table->string('permanent_barangay')->nullable();
            $table->string('permanent_city')->nullable();
            $table->string('permanent_province')->nullable();
            $table->string('permanent_zipcode')->nullable();
            $table->string('tel_no')->nullable();
            $table->string('mobile_no')->nullable();
            $table->string('email')->nullable();
            $table->integer('status')->default(0);
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('designation_id')
                ->references('id')
                ->on('designations');

            $table->foreign('department_id')
                ->references('id')
                ->on('departments');

            $table->foreign('academic_rank_id')
                ->references('id')
                ->on('academic_ranks');

            $table->foreign('administrative_rank_id')
                ->references('id')
                ->on('administrative_ranks');

            $table->foreign('campus_id')
                ->references('id')
                ->on('campuses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('personnels');
    }
}
