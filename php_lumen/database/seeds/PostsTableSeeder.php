<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
            'id' => 1,
            'title' => 'Hello lumen',
            'user_id' => 1,
            'content' => 'For more info, visit: https://lumen.laravel.com/'
        ]);
    }
}
