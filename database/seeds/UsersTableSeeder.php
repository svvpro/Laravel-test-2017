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
        $data = [
            [
                'name'=>'svv1',
                'email'=>'svv@mail.com',
                'password'=>bcrypt('111111'),
            ],
            [
                'name'=>'svv2',
                'email'=>'svv2@mail.com',
                'password'=>bcrypt('111111'),
            ],
            [
                'name'=>'svv3',
                'email'=>'svv3@mail.com',
                'password'=>bcrypt('111111'),
            ]
        ];

        DB::table('users')->insert($data);
    }
}
