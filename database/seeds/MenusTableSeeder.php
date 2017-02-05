<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenusTableSeeder extends Seeder
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
                'name'=>'Главная',
                'url'=>'/'
            ],
            [
                'name'=>'Статьи',
                'url'=>'/articles'
            ],
            [
                'name'=>'Контакты',
                'url'=>'/contacts'
            ]
        ];

        DB::table('menus')->insert($data);
    }
}
