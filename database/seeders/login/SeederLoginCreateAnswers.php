<?php

namespace Database\Seeders\login;

use App\Models\Register\Answer;
use Illuminate\Database\Seeder;

class SeederLoginCreateAnswers extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $answers = [
            [
                'question_id' => 1,
                'title' => 'respuesta 1',
                'is_correct' => false,
            ],
            [
                'question_id' => 1,
                'title' => 'raspuesta 2',
                'is_correct' => false,
            ],
            [
                'question_id' => 1,
                'title' => 'respuesta 3',
                'is_correct' => true,
            ],
            [
                'question_id' => 2,
                'title' => 'respuesta 1',
                'is_correct' => false,
            ],
            [
                'question_id' => 2,
                'title' => 'raspuesta 2',
                'is_correct' => false,
            ],
            [
                'question_id' => 2,
                'title' => 'respuesta 3',
                'is_correct' => true,
            ],
            [
                'question_id' => 3,
                'title' => 'respuesta 1',
                'is_correct' => false,
            ],
            [
                'question_id' => 3,
                'title' => 'raspuesta 2',
                'is_correct' => false,
            ],
            [
                'question_id' => 3,
                'title' => 'respuesta 3',
                'is_correct' => true,
            ],
        ];

        foreach ($answers as $answer) {
            Answer::create($answer);
        }
    }
}
