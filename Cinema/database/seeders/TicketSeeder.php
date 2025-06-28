<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Ticket;
use Illuminate\Support\Facades\DB;

class TicketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Tắt kiểm tra khóa ngoại để có thể xóa dữ liệu
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Ticket::query()->delete(); // Xóa dữ liệu nhưng giữ nguyên ID
        DB::statement('SET FOREIGN_KEY_CHECKS=1;'); // Bật lại kiểm tra khóa ngoại

        // Thêm dữ liệu mới
        Ticket::create([
            'movie_id' => 1,
            'cinema_id' => 1,
            'type' => 'Thường',
            'price' => 100000
        ]);

        Ticket::create([
            'movie_id' => 1,
            'cinema_id' => 1,
            'type' => 'VIP',
            'price' => 150000
        ]);
    }
}
