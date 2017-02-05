<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        DB::table('menus')->truncate();
//        DB::table('articles')->truncate();
//        DB::table('tags')->truncate();
//        DB::table('users')->truncate();
//        DB::table('news')->truncate();
        DB::table('blogs')->truncate();

//        $this->call(MenusTableSeeder::class);
//        $this->call(TagsTableSeeder::class);
//        $this->call(ArticlesTableSeeder::class);
//        $this->call(UsersTableSeeder::class);
//        $this->call(NewsTableSeeder::class);
        $this->call(BlogTableSeeder::class);
    }
}
