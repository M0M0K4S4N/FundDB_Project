<?php

use Illuminate\Database\Seeder;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('orders')->insert([
       'customer_id' => 1,
       'delivery_flag' => 0,
       'detail' => '',
       'order_time' => date("2017-10-13 15:0:0"),
      ]);

      DB::table('orders')->insert([
       'customer_id' => 1,
       'delivery_flag' => 0,
       'detail' => '',
       'order_time' => date("2017-10-13 15:1:0"),
      ]);

      DB::table('orders')->insert([
       'customer_id' => 2,
       'delivery_flag' => 2,
       'detail' => '',
       'order_time' => date("2017-10-13 16:0:0"),
      ]);
    }
}
