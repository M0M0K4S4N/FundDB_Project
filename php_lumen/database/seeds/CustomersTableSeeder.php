<?php

use Illuminate\Database\Seeder;

class CustomersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 4; $i++) {
          DB::table('customers')->insert([
           'name' => str_random(10),
           'password' => crypt('1234', config('user.password.salt')),
           'address' => str_random(20),
          ]);
        }
    }
}
