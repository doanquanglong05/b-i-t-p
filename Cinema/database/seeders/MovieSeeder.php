<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Movie;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $movies = [
            [
                'title' => 'Avengers: Endgame',
                'description' => 'Phim siêu anh hùng bom tấn của Marvel.',
                'poster' => 'avengers.jpg',
                'duration' => 181
            ],
            [
                'title' => 'Spider-Man: No Way Home',
                'description' => 'Người Nhện đối đầu với kẻ thù từ đa vũ trụ.',
                'poster' => 'spiderman.jpg',
                'duration' => 148
            ],
            [
                'title' => 'The Batman',
                'description' => 'Batman khám phá tội ác của Gotham.',
                'poster' => 'batman.jpg',
                'duration' => 176
            ],
            [
                'title' => 'Fast & Furious 9',
                'description' => 'Cuộc đua tốc độ đầy kịch tính.',
                'poster' => 'fast9.jpg',
                'duration' => 143
            ],
            [
                'title' => 'Jurassic World: Dominion',
                'description' => 'Thế giới khủng long đầy hiểm nguy.',
                'poster' => 'jurassic.jpg',
                'duration' => 147
            ],
        ];

        foreach ($movies as $movie) {
            Movie::create($movie);
        }
    }
}
