<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonnelGovernmentIssuedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personnel_government_issueds', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('personnel_information_id');
            $table->string('government_issued_id')->nullable();
            $table->string('government_issued_passport')->nullable();
            $table->string('government_date_issuance')->nullable();
            $table->string('government_place_issuance')->nullable();
            $table->string('government_issued_image')->nullable();
            $table->string('government_issued_appointment')->nullable();
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
        Schema::dropIfExists('personnel_government_issueds');
    }
}
