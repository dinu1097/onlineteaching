<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChatsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('chats')->insert([
            [
                'chat_id' => 1,
                'sender_id' => 1,
                'receiver_id' => 2,
                'message' => 'welcome',
                'timestamp' => '2024-08-28 17:43:37',
                'created_at' => '2024-08-29 00:43:37',
                'updated_at' => '2024-08-29 00:43:37',
            ],
            [
                'chat_id' => 2,
                'sender_id' => 22,
                'receiver_id' => 1,
                'message' => 'welcome',
                'timestamp' => '2024-09-02 10:06:24',
                'created_at' => '2024-09-02 17:06:24',
                'updated_at' => '2024-09-02 17:06:24',
            ],
        ]);
    }
}
