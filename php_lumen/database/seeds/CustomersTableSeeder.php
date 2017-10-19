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
          DB::table('customers')->insert([
           'name' => 'John Brody',
           'password' => crypt('1234', env('USER_PASSWORD_SALT')),
           'address' => str_random(20),
           'api_token' => str_random(30),
          ]);

          DB::table('customers')->insert([
           'name' => 'Ant Mod',
           'password' => crypt('1234', env('USER_PASSWORD_SALT')),
           'address' => str_random(20),
           'api_token' => str_random(30),
          ]);

          DB::table('customers')->insert([
           'name' => 'Bird Nok',
           'password' => crypt('1234', env('USER_PASSWORD_SALT')),
           'address' => str_random(20),
           'api_token' => str_random(30),
          ]);

          DB::table('customers')->insert([
           'name' => 'Cat Meow',
           'password' => crypt('1234', env('USER_PASSWORD_SALT')),
           'address' => str_random(20),
           'api_token' => str_random(30),
          ]);

          DB::table('customers')->insert([
           'name' => 'Nong Chachacha',
           'password' => crypt('1234', env('USER_PASSWORD_SALT')),
           'address' => str_random(20),
           'api_token' => str_random(30),
          ]);

    }
}
