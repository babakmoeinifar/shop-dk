<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            [
                'id'   => 1,
                'name' => 'مدیر'
            ],
            [
                'id' =>2,
                'name' =>'پشتیبان'
            ],
            [
                'id' =>3,
                'name' => 'فروشنده'
            ],
            [
                'id' => 4,
                'name' => 'کاربر عادی'
            ]
        ]);
    }
}
