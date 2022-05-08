<?php

namespace App\Http\Controllers\Api\questions;

use App\Http\Controllers\Controller;
use App\Repositories\Question\QuestionRepository;
use Exception;
use Illuminate\Http\JsonResponse;

class QuestionsController extends Controller
{
    protected QuestionRepository $questionRepository;

    public function __construct(
        QuestionRepository $questionRepository
    )
    {
        $this->questionRepository = $questionRepository;
    }

    public function getQuestions(): JsonResponse
    {
        try {
            $data = $this->questionRepository->all();

            return $this->success('ok', $data);
        }catch (Exception $exception) {
            return $this->error(exception_to_string($exception));
        }
    }
}
