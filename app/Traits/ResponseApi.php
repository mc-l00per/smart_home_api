<?php


namespace App\Traits;

use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;

trait ResponseApi
{
    /**
     * Core of response
     *
     * @param string            $message
     * @param integer           $statusCode
     * @param object|array|null $data
     * @param boolean           $isSuccess
     *
     * @return JsonResponse
     */
    public function coreResponse(string $message, int $statusCode, object|array $data = null, bool $isSuccess = true): JsonResponse
    {
        // Check the params
        if (!$message) return response()->json(['message' => 'Message is required'], 500);

        // Send the response
        if ($isSuccess) {
            return response()->json([
                'message' => $message,
                'error' => false,
                'code' => $statusCode,
                'data' => $data
            ], $statusCode);
        } else {
            return response()->json([
                'message' => $message,
                'error' => true,
                'code' => $statusCode,
            ], $statusCode);
        }
    }

    /**
     * Send any success response
     *
     * @param string            $message
     * @param object|array|null $data
     * @param integer           $statusCode
     *
     * @return JsonResponse
     */
    public function success(string $message, object|array $data = null, int $statusCode = 200): JsonResponse
    {
        return $this->coreResponse($message, $statusCode, $data);
    }

    /**
     * Send any error response
     *
     * @param string|Exception $message
     * @param integer          $statusCode
     *
     * @return JsonResponse
     */
    public function error(string|Exception $message, int $statusCode = 500): JsonResponse
    {
        if (!is_string($message)) $message = 'Message: ' . $message->getMessage() .
            ' -- File: ' . $message->getFile() .
            ' -- Line: ' . $message->getLine();

        Log::error($message);
        return $this->coreResponse($message, $statusCode, null, false);
    }
}
