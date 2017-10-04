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
        Schema::disableForeignKeyConstraints();
        $this->call('PostsTableSeeder');
        $this->call('UsersTableSeeder');
        $this->call('CategoriesTableSeeder');
        $this->call('PostsCategoriesTableSeeder');
        $this->call('TagsTableSeeder');
        $this->call('PostsTagsTableSeeder');
        Schema::enableForeignKeyConstraints();
    }
}
