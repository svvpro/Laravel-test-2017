<?php

use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data =  [
            [
                'name'=>'cars'
            ],
            [
                'name'=>'moto'
            ],
            [
                'name'=>'phone'
            ]
        ];

        DB::table('tags')->insert($data)->withTimestamps;
    }
}
