<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tasks')->insert([

            [
                'task_name' => 'Task 1',
                'due_date' => '2024-07-13 00:00:00',
                'is_deleted' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'task_name' => 'Task 2',
                'due_date' => '2024-07-14 00:00:00',
                'is_deleted' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'task_name' => 'Task 3',
                'due_date' => '2024-07-15 00:00:00',
                'is_deleted' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
