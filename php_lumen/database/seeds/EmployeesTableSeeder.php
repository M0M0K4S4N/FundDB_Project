<?php

use Illuminate\Database\Seeder;

class EmployeesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('employees')->insert([
         'name' => 'Rob Burn',
         'job' => 'manager',
         'supervisor' => null,
         'salary' => 25000,
        ]);

        DB::table('employees')->insert([
         'name' => 'James Taylor',
         'job' => 'chef',
         'supervisor' => 1,
         'salary' => 20000,
        ]);

        DB::table('employees')->insert([
         'name' => 'Bob Harley',
         'job' => 'waiter',
         'supervisor' => 1,
         'salary' => 10000,
        ]);

        DB::table('employees')->insert([
         'name' => 'Ford Gibson',
         'job' => 'delivery',
         'supervisor' => 1,
         'salary' => 10000,
        ]);
    }
}
