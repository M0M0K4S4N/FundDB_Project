<?php

use Illuminate\Database\Seeder;

class FoodsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      DB::table('foods')->insert([
        'name' => 'Fried Chicken',
        'price' => 30,
        'picture' => '/foodPic/fired_chicken.jpg',
        'type' => 'meal',
      ]);

      DB::table('foods')->insert([
        'name' => 'Tom Yum Kung',
        'price' => 35,
        'picture' => '/foodPic/fired_chicken.jpg',
        'type' => 'meal',
      ]);

      DB::table('foods')->insert([
        'name' => 'French Fries',
        'price' => 30,
        'picture' => '/foodPic/fired_chicken.jpg',
        'type' => 'snack',
      ]);

      DB::table('foods')->insert([
        'name' => 'Coke',
        'price' => 20,
        'picture' => '/foodPic/fired_chicken.jpg',
        'type' => 'drink',
      ]);

      DB::table('foods')->insert([
        'name' => 'Ice Cream',
        'price' => 20,
        'picture' => '/foodPic/fired_chicken.jpg',
        'type' => 'dessert',
      ]);

    }
}
