<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AcademicRanksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('academic_ranks')->insert([
            [
                'academic_rank' => 'Academic Rank 1',
            ],
            [
                'academic_rank' => 'Academic Rank 2',
            ],
            [
                'academic_rank' => 'Academic Rank 3',
            ],
        ]);
    }
}
