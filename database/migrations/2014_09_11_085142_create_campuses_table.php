<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCampusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campuses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('campus_name');
            $table->string('campus_access');
            $table->string('detailed_address');
            $table->string('province');
            $table->string('city');
            $table->string('barangay');
            $table->string('zip_code');
            $table->string('email');
            $table->string('tel_no');
            $table->string('mobile_no');
            $table->string('image');
            $table->softDeletes();
            $table->timestamps();
        });

        DB::table('campuses')->insert([
            [
                'campus_name' => 'Main Campus',
                'campus_access' => 'CAMPUS ONLY',
                'detailed_address' => 'SAMPLE ADDRESS',
                'province' => 'SAMPLE PROVINCE',
                'city' => 'SAMPLE CITY',
                'barangay' => 'SAMPLE BARANGAY',
                'zip_code' => 'SAMPLE ZIP CODE',
                'email' => 'maincampus@gmail.com',
                'tel_no' => 'SAMPLE TEL NO',
                'mobile_no' => 'SAMPLE MOBILE NO',
                'image' => 'SAMPLE IMAGE',
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('campuses');
    }
}
