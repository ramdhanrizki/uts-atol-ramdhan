<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'username' => 'admin',
            'name' => 'Ramdhan Rizki',
        	'email' => 'ramdhanrizki11@gmail.com',
        	'password' => bcrypt('admin'),
        ]);
    }
}
