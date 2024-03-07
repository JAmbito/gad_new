<?php

use App\ManagementType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ManagementTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('management_types')->insert([
            [
                'management_type' => 'Faculty',
                'classification' => ManagementType::CLASSIFICATION_TEACHING,
            ],
            [
                'management_type' => 'Non-teaching',
                'classification' => ManagementType::CLASSIFICATION_NON_TEACHING,
            ],
            [
                'management_type' => 'Top Management',
                'classification' => ManagementType::CLASSIFICATION_OTHER,
            ],
            [
                'management_type' => 'Technical',
                'classification' => ManagementType::CLASSIFICATION_OTHER,
            ],
        ]);
    }
}
