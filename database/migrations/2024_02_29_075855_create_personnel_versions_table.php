<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonnelVersionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personnel_versions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('version');
            $table->boolean('is_current')->default(false);
            $table->unsignedBigInteger('personnel_id');
            $table->unsignedBigInteger('personnel_information_id');
            $table->timestamps();

            $table->foreign('personnel_id')
                ->references('id')
                ->on('personnels');
            $table->foreign('personnel_information_id')
                ->references('id')
                ->on('personnel_information');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('personnel_versions');
    }
}
