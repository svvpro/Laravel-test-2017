<?php

use Illuminate\Database\Seeder;

class NewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data  = [
            [
                'title'=>'First news',
                'desc'=>'First news descrtiption',
                'text'=>'First newstext',
                'img'=>'image1.jpg',
                'created_at'=>date('Y-m-d H:i:s')
            ],
            [
                'title'=>'Second news',
                'desc'=>'Second news descrtiption',
                'text'=>'Second newstext',
                'img'=>'image2.jpg',
                'created_at'=>date('Y-m-d H:i:s')
            ],
        ];

        DB::table('news')->insert($data);
    }
}
