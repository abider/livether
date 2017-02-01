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
        \DB::table('users')->insert([
            'name' => 'abider',
            'email' => 'admin@abider.me',
            'password' => bcrypt('8868893qq'),
            'api_token' => str_random(64),
        ]);
    }
}
