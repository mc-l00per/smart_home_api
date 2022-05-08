<?php

namespace Database\Seeders\login;

use App\Models\Register\Question;
use Illuminate\Database\Seeder;

class SeederLoginCreateQuestion extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(): void
    {
        $questions = [
            [
                'title' => 'question 1',
                'category' => 'arduino',
                'rating' => 10,
            ],
            [
                'title' => 'question 2',
                'category' => 'hardware',
                'rating' => 7,
            ],
            [
                'title' => 'question 3',
                'category' => 'other',
                'rating' => 3,
            ],
        ];

        foreach ($questions as $question) {
            Question::create($question);
        }
    }
}
