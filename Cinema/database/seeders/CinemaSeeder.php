<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cinema;

class CinemaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $cinemas = [
            ['name' => 'CGV Machinco', 'location' => 'Trần Phú, Mộ Lao, Hà Đông, Hà Nội'],
            ['name' => 'CGV Vincom Bà Triệu', 'location' => '191 Bà Triệu, Hai Bà Trưng, Hà Nội'],
            ['name' => 'CGV Aeon Mall Long Biên', 'location' => '27 Cổ Linh, Long Biên, Hà Nội'],
            ['name' => 'CGV Vincom Nguyễn Chí Thanh', 'location' => '54A Nguyễn Chí Thanh, Đống Đa, Hà Nội'],
            ['name' => 'CGV Vincom Landmark 81', 'location' => '208 Nguyễn Hữu Cảnh, Bình Thạnh, TP.HCM'],
        ];

        foreach ($cinemas as $cinema) {
            Cinema::create($cinema);
        }
    }
}
