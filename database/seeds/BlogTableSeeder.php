<?php

use Illuminate\Database\Seeder;

class BlogTableSeeder extends Seeder
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
                'title' => 'First blog title',
                'text'=> 'First blog text',
                'image' => time().'.jpg',
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'title' => 'Second blog title',
                'text'=> 'Second blog text',
                'image' => time().'.jpg',
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'title' => 'Third blog title',
                'text'=> 'Third blog text',
                'image' => time().'.jpg',
                'created_at' => date('Y-m-d H:i:s')
            ],
        ];

        DB::table('blogs')->insert($data);
    }
}
