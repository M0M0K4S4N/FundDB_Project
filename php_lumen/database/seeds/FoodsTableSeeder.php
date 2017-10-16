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
        'picture' => '/',
        'type' => 'meal',
      ]);

      DB::table('foods')->insert([
        'name' => 'Tom Yum Kung',
        'price' => 35,
        'picture' => '/',
        'type' => 'meal',
      ]);

      DB::table('foods')->insert([
        'name' => 'French Fries',
        'price' => 30,
        'picture' => '/',
        'type' => 'snack',
      ]);

      DB::table('foods')->insert([
        'name' => 'Coke',
        'price' => 20+$i,
        'picture' => '/',
        'type' => 'drink',
      ]);

      DB::table('foods')->insert([
        'name' => 'Ice Cream',
        'price' => 20+$i,
        'picture' => '/',
        'type' => 'dessert',
      ]);

    }
}
