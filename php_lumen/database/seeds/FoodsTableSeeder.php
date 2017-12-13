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
        'name' => 'ไก่ทอด',
        'price' => 30,
        'picture' => '/foodPic/fired_chicken.jpg',
        'type' => 'meal',
      ]);

      DB::table('foods')->insert([
        'name' => 'ต้มยำกุ้ง',
        'price' => 35,
        'picture' => '/foodPic/tom_yum_kung.jpg',
        'type' => 'meal',
      ]);

      DB::table('foods')->insert([
        'name' => 'ปูผัดผงกะกรี่',
        'price' => 35,
        'picture' => '/foodPic/curry_crab.jpg',
        'type' => 'meal',
      ]);

      DB::table('foods')->insert([
        'name' => 'เฟรนช์ฟราย',
        'price' => 30,
        'picture' => '/foodPic/french_fired.jpg',
        'type' => 'snack',
      ]);

      DB::table('foods')->insert([
        'name' => 'โค้ก',
        'price' => 15,
        'picture' => '/foodPic/coke.jpg',
        'type' => 'drink',
      ]);

      DB::table('foods')->insert([
        'name' => 'ไอศกรีมกะทิ',
        'price' => 20,
        'picture' => '/foodPic/coconut_icecream.jpg',
        'type' => 'dessert',
      ]);

    }
}
