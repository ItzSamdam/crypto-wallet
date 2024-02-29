<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

trait ApiResponse {

    /**
     * Building Data response
     * @param string $message
     * @param $data
     * @return JsonResponse
     */
    protected function dataResponse(string $message, $data): JsonResponse
    {
        $response = [
            'statusCode'=> Response::HTTP_OK,
            'status' 	=> 'success',
            'message' => $message,
            'data' => $data
        ];
        return response()->json($response,$response['statusCode'] );
    }

    /**
     * Building Ok response
     * @param string $message
     * @return JsonResponse
     */
    protected function OkResponse(string $message): JsonResponse
    {
        $response = [
            'statusCode'=> Response::HTTP_OK,
            'status' 	=> 'success',
            'message' => $message,
        ];
        return response()->json($response,$response['statusCode'] );
    }

    /**
     * Building success response
     * @param string $message
     * @param $data
     * @return JsonResponse
     */
    protected function CreatedResponse(string $message, $data): JsonResponse
    {
        $response = [
            'statusCode'=> Response::HTTP_CREATED,
            'status' 	=> 'success',
            'message' => $message,
            'data' => $data
        ];
        return response()->json($response,$response['statusCode'] );
    }

    /**
     * Building Not Found response
     * @param string $message
     * @return JsonResponse
     */
    protected function notFoundResponse(string $message): JsonResponse
    {
        $response = [
            'statusCode'=> Response::HTTP_NOT_FOUND,
            'status'	=> 'error',
            'message' 	=> $message,
        ];

        return response()->json( $response, $response['statusCode'] );
    }

    /**
     * Building Unauthorized response
     * @return JsonResponse
     */
    protected function authenticationRequiredResponse(): JsonResponse
    {
        $response = [
            'statusCode' => Response::HTTP_UNAUTHORIZED,
            'status' 	=> 'error',
            'message' 	=> 'Authentication Required',
        ];
        return response()->json( $response, $response['statusCode'] );
    }

    /**
     * Building Forbidden error response
     * @return JsonResponse
     */
    protected function forbiddenResponse(): JsonResponse
    {
        $response = [
            'statusCode'=> Response::HTTP_FORBIDDEN,
            'status' 	=> 'error',
            'message' => 'Forbidden Access',
        ];

        return response()->json($response,$response['statusCode'] );
    }

    /**
     * Building Access Revoked error response
     * @param string $message
     * @param null $data
     * @return JsonResponse
     */
    protected function accessRevokedResponse($message='Access Revoked', $data = null): JsonResponse
    {
        $response = [
            'statusCode'=> Response::HTTP_FORBIDDEN,
            'status' 	=> 'error',
            'message' => $message,
            'data' => $data
        ];

        return response()->json($response,$response['statusCode'] );
    }


    /**
     * Building delete response
     * @param string $message
     * @return JsonResponse
     */
    protected function deleteResponse(string $message): JsonResponse
    {
        $response = [
            'statusCode'=> Response::HTTP_NO_CONTENT,
            'status' 	=> 'success',
            'message' 	=> $message
        ];
        return response()->json($response,$response['statusCode'] );
    }

    /**
     * Building empty response
     * @param $message
     * @return JsonResponse
     */
    protected function emptyResponse($message): JsonResponse
    {
        $response = [
            'statusCode'=> Response::HTTP_NO_CONTENT,
            'status'	=> 'success',
            'message' 	=> $message,
            'data' => []
        ];
        return response()->json($response,$response['statusCode'] );
    }

    /**
     * Building error response
     * @param string $message
     * @param $data
     * @return JsonResponse
     */
    protected function errorResponse(string $message, $data = null): JsonResponse
    {
        $response = [
            'statusCode'=> Response::HTTP_UNPROCESSABLE_ENTITY,
            'status' 	=> 'error',
            'message' 	=> $message,
            'data' 		=> $data,
        ];

        return response()->json($response,$response['statusCode'] );
    }

    /**
     * Building server response
     * @param string $message
     * @param $data
     * @return JsonResponse
     */
    protected function serverError(string $message, $data): JsonResponse
    {
        $response = [
            'statusCode'=> Response::HTTP_INTERNAL_SERVER_ERROR,
            'status' 	=> 'error',
            'message' 	=> $message,
            'data' 		=> $data,
        ];

        return response()->json($response,$response['statusCode'] );
    }

    /**
     * Building server response
     * @param $data
     * @return JsonResponse
     */
    protected function methodNotAllowed($data): JsonResponse
    {
        $response = [
            'statusCode' => Response::HTTP_METHOD_NOT_ALLOWED,
            'status'     => 'error',
            'message'     => 'Method Not Allowed',
            'data'         => $data,
        ];

        return response()->json($response, $response['statusCode']);
    }
}