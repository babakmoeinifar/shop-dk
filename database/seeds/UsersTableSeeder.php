<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [   'id' => 1,
                'role_id' => 1,
                'is_active' => 1,
                'fname' => 'admin',
                'lname' => 'admin',
                'email' => 'admin@shoppy.com',
                'mobile' => '11111111',
                'password' => bcrypt('11111111')
            ]
        ]);
    }
}
