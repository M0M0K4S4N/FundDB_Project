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
        DB::table('tags')->insert([
            'id' => 1,
            'title' => 'php'
        ]);

        DB::table('tags')->insert([
            'id' => 2,
            'title' => 'luman'
        ]);

        DB::table('tags')->insert([
            'id' => 3,
            'title' => 'framework'
        ]);
    }
}
