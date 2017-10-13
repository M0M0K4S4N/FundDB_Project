<?php

use Illuminate\Database\Seeder;

class OrderfoodlistsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('orderfoodlists')->insert([
       'order_id' => 1,
       'food_id' => 1,
       'Qty' => 1,
       'cook_by' => 2,
       'cooking_flag' => 0,
       'serve_flag' => 0,
       'isPaid' => 0,
      ]);
      DB::table('orderfoodlists')->insert([
       'order_id' => 1,
       'food_id' => 2,
       'Qty' => 1,
       'cook_by' => 2,
       'cooking_flag' => 0,
       'serve_flag' => 0,
       'isPaid' => 0,
      ]);
      DB::table('orderfoodlists')->insert([
       'order_id' => 2,
       'food_id' => 3,
       'Qty' => 3,
       'cook_by' => 2,
       'cooking_flag' => 0,
       'serve_flag' => 0,
       'isPaid' => 0,
      ]);
    }
}
