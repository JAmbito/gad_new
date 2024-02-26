<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DesignationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $managementTypes = DB::table('management_types')->get();
        if (count($managementTypes) <= 0) {
            $this->call([
                ManagementTypesTableSeeder::class
            ]);
        }

        $managementTypes = DB::table('management_types')->get();
        foreach ($managementTypes as $managementType) {
            $managementTypeId = $managementType->id;
            $managementTypeName = $managementType->management_type;
            DB::table('designations')->insert([
                [
                    'designation' => "$managementTypeName Designation 1",
                    'management_type_id' => $managementTypeId,
                ],
                [
                    'designation' => "$managementTypeName Designation 2",
                    'management_type_id' => $managementTypeId,
                ],
            ]);
        }
    }
}
