<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder2 extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'ジョブ',
                'email' => 'user1@example.com',
                'sex' => '0',
                'self_introduction' => 'ジョブズです',
                'img_name' => 'sample001.jpg',
                'password' => bcrypt('password123'),
            ],
        ]);
    }
}
