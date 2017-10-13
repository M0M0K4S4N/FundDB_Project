<?php

use Illuminate\Database\Seeder;

class PromotionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('promotions')->insert([
         'name' => str_random(10),
         'discount_for' => 1,
         'discount_value' => 5,
         'start_date' => date("2017-10-13 12:0:0"),
         'end_date' => date("2017-10-15 12:0:0"),
        ]);

        DB::table('promotions')->insert([
         'name' => str_random(10),
         'discount_for' => 2,
         'discount_value' => 5,
         'start_date' => date("2017-10-14 13:0:0"),
         'end_date' => date("2017-10-18 13:0:0"),
        ]);
    }
}
