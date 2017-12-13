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
           'name' => 'โต๊ะ 1',
           'password' => crypt('1234', env('USER_PASSWORD_SALT')),
           'address' => '-',
           'api_token' => str_random(30),
          ]);

          DB::table('customers')->insert([
           'name' => 'โต๊ะ 2',
           'password' => crypt('1234', env('USER_PASSWORD_SALT')),
           'address' => '-',
           'api_token' => str_random(30),
          ]);

          DB::table('customers')->insert([
           'name' => 'โต๊ะ 3',
           'password' => crypt('1234', env('USER_PASSWORD_SALT')),
           'address' => '-',
           'api_token' => str_random(30),
          ]);

          DB::table('customers')->insert([
           'name' => 'โต๊ะ 4',
           'password' => crypt('1234', env('USER_PASSWORD_SALT')),
           'address' => '-',
           'api_token' => str_random(30),
          ]);

          DB::table('customers')->insert([
           'name' => 'John Brody',
           'password' => crypt('1234', env('USER_PASSWORD_SALT')),
           'address' => 'มช',
           'api_token' => str_random(30),
           'lat' => '18.8059685',
           'long' => '98.95336210000005'
          ]);

          DB::table('customers')->insert([
           'name' => 'Jane Doe',
           'password' => crypt('1234', env('USER_PASSWORD_SALT')),
           'address' => 'มช',
           'api_token' => str_random(30),
           'lat' => '18.8059685',
           'long' => '98.95336210000005'
          ]);

          DB::table('customers')->insert([
           'name' => 'Bob',
           'password' => crypt('1234', env('USER_PASSWORD_SALT')),
           'address' => 'มช',
           'api_token' => str_random(30),
           'lat' => '18.8059685',
           'long' => '98.95336210000005'
          ]);

    }
}
