<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCreatedByAndReviewedByToPersonnelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('personnels', function (Blueprint $table) {
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('reviewed_by')->nullable();

            $table->foreign('created_by')
                ->references('id')
                ->on('users');
            $table->foreign('reviewed_by')
                ->references('id')
                ->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('personnels', function (Blueprint $table) {
            $table->dropColumn('created_by');
            $table->dropColumn('reviewed_by');
        });
    }
}
