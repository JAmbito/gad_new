<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameAllPersonnelIdColumnToPersonnelInformationId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('personnel_families', function (Blueprint $table) {
            $table->renameColumn('personnel_id', 'personnel_information_id');
        });
        Schema::table('personnel_childrens', function (Blueprint $table) {
            $table->renameColumn('personnel_id', 'personnel_information_id');
        });
        Schema::table('personnel_educationals', function (Blueprint $table) {
            $table->renameColumn('personnel_id', 'personnel_information_id');
        });
        Schema::table('personnel_government_issueds', function (Blueprint $table) {
            $table->renameColumn('personnel_id', 'personnel_information_id');
        });
        Schema::table('personnel_hobbies', function (Blueprint $table) {
            $table->renameColumn('personnel_id', 'personnel_information_id');
        });
        Schema::table('personnel_learnings', function (Blueprint $table) {
            $table->renameColumn('personnel_id', 'personnel_information_id');
        });
        Schema::table('personnel_memberships', function (Blueprint $table) {
            $table->renameColumn('personnel_id', 'personnel_information_id');
        });
        Schema::table('personnel_non_academics', function (Blueprint $table) {
            $table->renameColumn('personnel_id', 'personnel_information_id');
        });
        Schema::table('personnel_questionaires', function (Blueprint $table) {
            $table->renameColumn('personnel_id', 'personnel_information_id');
        });
        Schema::table('personnel_references', function (Blueprint $table) {
            $table->renameColumn('personnel_id', 'personnel_information_id');
        });
        Schema::table('personnel_services', function (Blueprint $table) {
            $table->renameColumn('personnel_id', 'personnel_information_id');
        });
        Schema::table('personnel_voluntary_works', function (Blueprint $table) {
            $table->renameColumn('personnel_id', 'personnel_information_id');
        });
        Schema::table('personnel_works', function (Blueprint $table) {
            $table->renameColumn('personnel_id', 'personnel_information_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('personnel_families', function (Blueprint $table) {
            $table->renameColumn('personnel_information_id', 'personnel_id');
        });
        Schema::table('personnel_childrens', function (Blueprint $table) {
            $table->renameColumn('personnel_information_id', 'personnel_id');
        });
        Schema::table('personnel_educationals', function (Blueprint $table) {
            $table->renameColumn('personnel_information_id', 'personnel_id');
        });
        Schema::table('personnel_government_issueds', function (Blueprint $table) {
            $table->renameColumn('personnel_information_id', 'personnel_id');
        });
        Schema::table('personnel_hobbies', function (Blueprint $table) {
            $table->renameColumn('personnel_information_id', 'personnel_id');
        });
        Schema::table('personnel_learnings', function (Blueprint $table) {
            $table->renameColumn('personnel_information_id', 'personnel_id');
        });
        Schema::table('personnel_memberships', function (Blueprint $table) {
            $table->renameColumn('personnel_information_id', 'personnel_id');
        });
        Schema::table('personnel_non_academics', function (Blueprint $table) {
            $table->renameColumn('personnel_information_id', 'personnel_id');
        });
        Schema::table('personnel_questionaires', function (Blueprint $table) {
            $table->renameColumn('personnel_information_id', 'personnel_id');
        });
        Schema::table('personnel_references', function (Blueprint $table) {
            $table->renameColumn('personnel_information_id', 'personnel_id');
        });
        Schema::table('personnel_services', function (Blueprint $table) {
            $table->renameColumn('personnel_information_id', 'personnel_id');
        });
        Schema::table('personnel_voluntary_works', function (Blueprint $table) {
            $table->renameColumn('personnel_information_id', 'personnel_id');
        });
        Schema::table('personnel_works', function (Blueprint $table) {
            $table->renameColumn('personnel_information_id', 'personnel_id');
        });
    }
}
