<?php

use App\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $superadmin = User::where('email', 'superadmin@gmail.com')->first();
        if (!$superadmin) {
            DB::table('users')->insert([
                [
                    'name' => 'Super Admin',
                    'email' => 'superadmin@gmail.com',
                    'password' => Hash::make('P@ssw0rd')
                ],
            ]);
        }

    }
}
