<?php

use Illuminate\Database\Seeder;

class PostsTagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts_tags')->insert([
            'post_id' => 1,
            'tag_id' => 1
        ]);

        DB::table('posts_tags')->insert([
            'post_id' => 1,
            'tag_id' => 2
        ]);

        DB::table('posts_tags')->insert([
            'post_id' => 1,
            'tag_id' => 3
        ]);
    }
}
