<?php

use Illuminate\Database\Seeder;

class DepartmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('departments')->insert([
            [
                'department' => 'Department 1',
            ],
            [
                'department' => 'Department 2',
            ],
            [
                'department' => 'Department 3',
            ],
        ]);
    }
}
