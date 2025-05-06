<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class hrseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        DB::table('departments')->insert([
            [
                'name' => 'HR',
                'description' => 'Human Resource',
                'status' => 'active',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'IT',
                'description' => 'Information Technology',
                'status' => 'active',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);

        DB::table('roles')->insert([
            [
                'title' => 'HR Manager',
                'description' => 'Handling Tim',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Developer',
                'description' => 'Coding Tim',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            
        ]);

        DB::table('employees')->insert([
            [
                'name' => $faker->name,
                'email' => $faker->email,
                'phone_number' => $faker->phoneNumber,
                'address' => $faker->address,
                'department_id' => 1,
                'role_id' => 1,
                'birth_date' => $faker->date,
                'hire_date' => $faker->date,
                'salary' => $faker->randomFloat(2, 10000, 100000),
                'status' => 'active',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => $faker->name,
                'email' => $faker->email,
                'phone_number' => $faker->phoneNumber,
                'address' => $faker->address,
                'department_id' => 1,
                'role_id' => 1,
                'birth_date' => $faker->date,
                'hire_date' => $faker->date,
                'salary' => $faker->randomFloat(2, 10000, 100000),
                'status' => 'active',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        ]);

        DB::table('tasks')->insert([
            [
                'title' => $faker->sentence(3),
                'description' => $faker->paragraph,
                'assigned_to' => 1,
                'due_date' => Carbon::now()->addDays(7),
                'status' => 'pending',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => $faker->sentence(3),
                'description' => $faker->paragraph,
                'assigned_to' => 1,
                'due_date' => Carbon::now()->addDays(7),
                'status' => 'pending',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        ]);
        

        DB::table('payroles')->insert([
            [
                'employee_id' => 1,
                'salary' => $faker->randomFloat(2, 10000, 100000),
                'bonuses' => $faker->randomFloat(2, 10000, 100000),
                'net_salary' => $faker->randomFloat(2, 10000, 100000),
                'deductions' => $faker->randomFloat(2, 10000, 100000),
                'pay_date' => Carbon::now(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],[
                'employee_id' => 2,
                'salary' => $faker->randomFloat(2, 10000, 100000),
                'bonuses' => $faker->randomFloat(2, 10000, 100000),
                'net_salary' => $faker->randomFloat(2, 10000, 100000),
                'deductions' => $faker->randomFloat(2, 10000, 100000),
                'pay_date' => Carbon::now(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        ]);

        DB::table('presenses')->insert([
            [
                'employee_id' => 1,
                'check_in' => Carbon::now(),
                'check_out' => Carbon::now(),
                'status' => 'present',
                'date' => Carbon::now(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'employee_id' => 2,
                'check_in' => Carbon::now(),
                'check_out' => Carbon::now(),
                'status' => 'present',
                'date' => Carbon::now(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        ]);

        DB::table('leave_requests')->insert([
            [
                'employee_id' => 1,
                'leave_type' => 'sakit',
                'start_date' => Carbon::parse(time: '2025-05-05'),
                'end_date' => Carbon::parse(time: '2025-05-10'),
                'status' => 'pending',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'employee_id' => 2,
                'leave_type' => 'liburan',
                'start_date' => Carbon::parse(time: '2025-05-05'),
                'end_date' => Carbon::parse(time: '2025-05-10'),
                'status' => 'pending',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

        ]);
    }
}
