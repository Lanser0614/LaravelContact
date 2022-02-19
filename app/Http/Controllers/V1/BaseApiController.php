<?php


namespace App\Http\Controllers\V1;


use App\Http\Controllers\Controller;
use App\Traits\MessageCodes;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class BaseApiController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests,MessageCodes;

    protected function responseWithData($data = [], int $statusCode = 200): JsonResponse
    {
        $response = [
            'message'=>$this->getMessage($statusCode),
            'data' => $data,
        ];
        return $this->responseWith($response, $statusCode);
    }

    protected function responseWithMessage(int $statusCode = 200): JsonResponse
    {
        $response = [
            'message' => $this->getMessage($statusCode),
            'data'=>[]
        ];

        return $this->responseWith($response, $statusCode);
    }

    protected function responseValidationErrors($validationErrors): JsonResponse
    {
        return $this->responseWith($validationErrors, Response::HTTP_BAD_REQUEST);
    }

    private function responseWith(array $response, int $statusCode): JsonResponse
    {
        return response()->json($response)->setStatusCode($statusCode);
    }

    protected function respondWithToken($token): JsonResponse
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }
}
