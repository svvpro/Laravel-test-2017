<?php

use Illuminate\Database\Seeder;

class ArticlesTableSeeder extends Seeder
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
                'title'=>'First article',
                'text'=>'First article text',
                'image'=>str_random(12).'.jpg'
            ],
            [
                'title'=>'Second article',
                'text'=>'Second article text',
                'image'=>str_random(12).'.jpg'
            ],
            [
                'title'=>'Third article',
                'text'=>'Third article text',
                'image'=>str_random(12).'.jpg'
            ],
            [
                'title'=>'Fourth article',
                'text'=>'Fourth article text',
                'image'=>str_random(12).'.jpg'
            ]
        ];

        DB::table('articles')->insert($data);
    }
}
