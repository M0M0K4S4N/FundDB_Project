<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Schema::disableForeignKeyConstraints();
      $this->call('CustomersTableSeeder');
      $this->call('EmployeesTableSeeder');
      $this->call('FoodsTableSeeder');
      $this->call('PromotionsTableSeeder');
      $this->call('OrdersTableSeeder');
      $this->call('OrderfoodlistsTableSeeder');
      Schema::enableForeignKeyConstraints();
    }
}
