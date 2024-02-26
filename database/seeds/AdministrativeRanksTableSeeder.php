<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdministrativeRanksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('administrative_ranks')->insert([
            [
                'administrative_rank' => 'Administrative Rank 1',
            ],
            [
                'administrative_rank' => 'Administrative Rank 2',
            ],
            [
                'administrative_rank' => 'Administrative Rank 3',
            ],
        ]);
    }
}
