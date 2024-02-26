<?php

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
                'management_type' => 'Management Type 1',
            ],
            [
                'management_type' => 'Management Type 2',
            ],
            [
                'management_type' => 'Management Type 3',
            ],
        ]);
    }
}
