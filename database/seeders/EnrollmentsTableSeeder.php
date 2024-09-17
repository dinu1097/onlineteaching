<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EnrollmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('enrollments')->insert([
            [
                'enrollment_id' => 1,
                'student_id' => 22,
                'course_id' => 7,
                'payment_status' => 'completed',
                'created_at' => '2024-09-02 10:25:27',
                'updated_at' => '2024-09-02 10:25:27',
            ],
        ]);
    }
}
