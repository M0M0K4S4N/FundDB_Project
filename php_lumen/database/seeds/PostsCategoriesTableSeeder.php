<?php

use Illuminate\Database\Seeder;

class PostsCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts_categories')->insert([
            'post_id' => 1,
            'category_id' => 1
        ]);
    }
}
