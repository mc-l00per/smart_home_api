<?php

namespace App\Http\Controllers\Api\Login;

use App\Http\Controllers\Controller;
use App\Repositories\Question\QuestionRepository;
use App\Resources\Questions\ResourceGetQuestions;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


/**
 * @method error(string $string, int $int)
 */
class LoginController extends Controller
{
    protected QuestionRepository $questionRepository;

    public function __construct(
        QuestionRepository $questionRepository
    )
    {
        $this->questionRepository = $questionRepository;
    }

    public function login(Request $request): JsonResponse
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
            'remember_me' => 'boolean'
        ]);

        $credentials = request(['email', 'password']);

        if (!Auth::attempt($credentials)) return $this->error("Login no autorizado", 403);

        $user = $request->user();
        $tokenResult = $user->createToken('Personal Access Token');

        $token = $tokenResult->token;

        if ($request['remember_me']) $token->expires_at = Carbon::now()->addWeeks();

        $token->save();

        return $this->success('Authorized', [
            'access_token' => $tokenResult->accessToken,
            'token_type' => 'Bearer',
            'expires_at' => Carbon::parse($token->expires_at)->toDateTimeString()
        ]);
    }

    public function getDataRegister(): JsonResponse
    {
        $data = $this->questionRepository->all();
        $response = ResourceGetQuestions::collection($data);
        return $this->success('ok', $response);
    }

    /**
     * Cierre de sesión (anular el token)
     */
    public function logout(Request $request): JsonResponse
    {
        $request->user()->token()->revoke();

        return $this->success('Successfully logged out');
    }
}
