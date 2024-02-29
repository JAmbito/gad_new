<?php

use Illuminate\Database\Seeder;

class CampusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('campuses')->insert([
            [
                'campus_name' => 'Balanga Campus',
                'detailed_address' => 'SAMPLE ADDRESS',
                'province' => 'SAMPLE PROVINCE',
                'city' => 'SAMPLE CITY',
                'barangay' => 'SAMPLE BARANGAY',
                'zip_code' => 'SAMPLE ZIP CODE',
                'email' => 'balangacampus@gmail.com',
                'tel_no' => 'SAMPLE TEL NO',
                'mobile_no' => 'SAMPLE MOBILE NO',
                'image' => 'SAMPLE IMAGE',
            ],
            [
                'campus_name' => 'Abucay Campus',
                'detailed_address' => 'SAMPLE ADDRESS',
                'province' => 'SAMPLE PROVINCE',
                'city' => 'SAMPLE CITY',
                'barangay' => 'SAMPLE BARANGAY',
                'zip_code' => 'SAMPLE ZIP CODE',
                'email' => 'abucaycampus@gmail.com',
                'tel_no' => 'SAMPLE TEL NO',
                'mobile_no' => 'SAMPLE MOBILE NO',
                'image' => 'SAMPLE IMAGE',
            ],
            [
                'campus_name' => 'Samal Campus',
                'detailed_address' => 'SAMPLE ADDRESS',
                'province' => 'SAMPLE PROVINCE',
                'city' => 'SAMPLE CITY',
                'barangay' => 'SAMPLE BARANGAY',
                'zip_code' => 'SAMPLE ZIP CODE',
                'email' => 'samalcampus@gmail.com',
                'tel_no' => 'SAMPLE TEL NO',
                'mobile_no' => 'SAMPLE MOBILE NO',
                'image' => 'SAMPLE IMAGE',
            ],
        ]);
    }
}
