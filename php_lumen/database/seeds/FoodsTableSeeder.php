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
      for ($i=0; $i < 5; $i++) {
        DB::table('foods')->insert([
         'name' => str_random(10),
         'price' => 20+$i,
         'picture' => '/',
         'type' => 'meal',
        ]);
      }
    }
}
