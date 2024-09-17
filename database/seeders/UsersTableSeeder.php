<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'user_id' => 1,
                'name' => 'Alice Johnson',
                'email' => 'alice.johnson@example.com',
                'password' => bcrypt('hashed_password_1'),
                'role' => 'teacher',
                'created_at' => '2024-08-01 19:00:00',
                'updated_at' => '2024-08-01 19:00:00',
                'remember_token' => 'token_1',
            ],
            [
                'user_id' => 2,
                'name' => 'Bob Smith',
                'email' => 'bob.smith@example.com',
                'password' => bcrypt('hashed_password_2'),
                'role' => 'teacher',
                'created_at' => '2024-08-01 19:05:00',
                'updated_at' => '2024-08-01 19:05:00',
                'remember_token' => 'token_2',
            ],
            [
                'user_id' => 3,
                'name' => 'Charlie Brown',
                'email' => 'charlie.brown@example.com',
                'password' => bcrypt('hashed_password_3'),
                'role' => 'teacher',
                'created_at' => '2024-08-01 19:10:00',
                'updated_at' => '2024-08-01 19:10:00',
                'remember_token' => 'token_3',
            ],
            [
                'user_id' => 4,
                'name' => 'Diana Prince',
                'email' => 'diana.prince@example.com',
                'password' => bcrypt('hashed_password_4'),
                'role' => 'teacher',
                'created_at' => '2024-08-01 19:15:00',
                'updated_at' => '2024-08-01 19:15:00',
                'remember_token' => 'token_4',
            ],
            [
                'user_id' => 5,
                'name' => 'Edward Norton',
                'email' => 'edward.norton@example.com',
                'password' => bcrypt('hashed_password_5'),
                'role' => 'teacher',
                'created_at' => '2024-08-01 19:20:00',
                'updated_at' => '2024-08-01 19:20:00',
                'remember_token' => 'token_5',
            ],
            [
                'user_id' => 6,
                'name' => 'Fiona Apple',
                'email' => 'fiona.apple@example.com',
                'password' => bcrypt('hashed_password_6'),
                'role' => 'teacher',
                'created_at' => '2024-08-01 19:25:00',
                'updated_at' => '2024-08-01 19:25:00',
                'remember_token' => 'token_6',
            ],
            [
                'user_id' => 7,
                'name' => 'George Lucas',
                'email' => 'george.lucas@example.com',
                'password' => bcrypt('hashed_password_7'),
                'role' => 'teacher',
                'created_at' => '2024-08-01 19:30:00',
                'updated_at' => '2024-08-01 19:30:00',
                'remember_token' => 'token_7',
            ],
            [
                'user_id' => 8,
                'name' => 'Hannah Montana',
                'email' => 'hannah.montana@example.com',
                'password' => bcrypt('hashed_password_8'),
                'role' => 'teacher',
                'created_at' => '2024-08-01 19:35:00',
                'updated_at' => '2024-08-01 19:35:00',
                'remember_token' => 'token_8',
            ],
            [
                'user_id' => 9,
                'name' => 'Ian McKellen',
                'email' => 'ian.mckellen@example.com',
                'password' => bcrypt('hashed_password_9'),
                'role' => 'teacher',
                'created_at' => '2024-08-01 19:40:00',
                'updated_at' => '2024-08-01 19:40:00',
                'remember_token' => 'token_9',
            ],
            [
                'user_id' => 10,
                'name' => 'Julia Roberts',
                'email' => 'julia.roberts@example.com',
                'password' => bcrypt('hashed_password_10'),
                'role' => 'teacher',
                'created_at' => '2024-08-01 19:45:00',
                'updated_at' => '2024-08-01 19:45:00',
                'remember_token' => 'token_10',
            ],
            [
                'user_id' => 11,
                'name' => 'John Doe',
                'email' => 'john.doe@example.com',
                'password' => bcrypt('hashed_password_11'),
                'role' => 'student',
                'created_at' => '2024-08-01 22:00:00',
                'updated_at' => '2024-08-01 22:00:00',
                'remember_token' => 'token_11',
            ],
            [
                'user_id' => 12,
                'name' => 'Jane Smith',
                'email' => 'jane.smith@example.com',
                'password' => bcrypt('hashed_password_12'),
                'role' => 'student',
                'created_at' => '2024-08-01 22:05:00',
                'updated_at' => '2024-08-01 22:05:00',
                'remember_token' => 'token_12',
            ],
            [
                'user_id' => 13,
                'name' => 'Michael Johnson',
                'email' => 'michael.johnson@example.com',
                'password' => bcrypt('hashed_password_13'),
                'role' => 'student',
                'created_at' => '2024-08-01 22:10:00',
                'updated_at' => '2024-08-01 22:10:00',
                'remember_token' => 'token_13',
            ],
            [
                'user_id' => 14,
                'name' => 'Emily Davis',
                'email' => 'emily.davis@example.com',
                'password' => bcrypt('hashed_password_14'),
                'role' => 'student',
                'created_at' => '2024-08-01 22:15:00',
                'updated_at' => '2024-08-01 22:15:00',
                'remember_token' => 'token_14',
            ],
            [
                'user_id' => 15,
                'name' => 'Daniel Martinez',
                'email' => 'daniel.martinez@example.com',
                'password' => bcrypt('hashed_password_15'),
                'role' => 'student',
                'created_at' => '2024-08-01 22:20:00',
                'updated_at' => '2024-08-01 22:20:00',
                'remember_token' => 'token_15',
            ],
            [
                'user_id' => 16,
                'name' => 'Sophia Garcia',
                'email' => 'sophia.garcia@example.com',
                'password' => bcrypt('hashed_password_16'),
                'role' => 'student',
                'created_at' => '2024-08-01 22:25:00',
                'updated_at' => '2024-08-01 22:25:00',
                'remember_token' => 'token_16',
            ],
            [
                'user_id' => 17,
                'name' => 'James Brown',
                'email' => 'james.brown@example.com',
                'password' => bcrypt('hashed_password_17'),
                'role' => 'student',
                'created_at' => '2024-08-01 22:30:00',
                'updated_at' => '2024-08-01 22:30:00',
                'remember_token' => 'token_17',
            ],
            [
                'user_id' => 18,
                'name' => 'Olivia Wilson',
                'email' => 'olivia.wilson@example.com',
                'password' => bcrypt('hashed_password_18'),
                'role' => 'student',
                'created_at' => '2024-08-01 22:35:00',
                'updated_at' => '2024-08-01 22:35:00',
                'remember_token' => 'token_18',
            ],
            [
                'user_id' => 19,
                'name' => 'David Lee',
                'email' => 'david.lee@example.com',
                'password' => bcrypt('hashed_password_19'),
                'role' => 'student',
                'created_at' => '2024-08-01 22:40:00',
                'updated_at' => '2024-08-01 22:40:00',
                'remember_token' => 'token_19',
            ],
            [
                'user_id' => 20,
                'name' => 'Emma Thompson',
                'email' => 'emma.thompson@example.com',
                'password' => bcrypt('hashed_password_20'),
                'role' => 'student',
                'created_at' => '2024-08-01 22:45:00',
                'updated_at' => '2024-08-01 22:45:00',
                'remember_token' => 'token_20',
            ],
            [
                'user_id' => 21,
                'name' => 'kaku',
                'email' => 'kaku@gmail.com',
                'password' => '$2y$12$dI51xOi5C9Q/.zZTNrn.qecKZ5vtjUoeSHkLvxbDMDwVaB82wweO2',
                'role' => 'student',
                'created_at' => '2024-08-29 00:50:15',
                'updated_at' => '2024-08-29 00:50:15',
                'remember_token' => NULL,
            ],
            [
                'user_id' => 22,
                'name' => 'dinnis kuttikkat',
                'email' => 'dinnis@gmail.com',
                'password' => '$2y$12$lCz8hRfnMeACR1zeJcznh.L7ODXzwpGwQByWkQWdmP9dJuJkQ49Um',
                'role' => 'teacher',
                'created_at' => '2024-09-02 17:01:52',
                'updated_at' => '2024-09-02 17:01:52',
                'remember_token' => NULL,
            ],
        ]);
    }
}