<?php
namespace App\Services;

use Illuminate\Support\Facades\Storage;

class ResponseService
{
    public static function toArray($status, $message, $data = null, $errors = null)
    {
        switch ($errors) {
            case null:
                $response = [
                    'status'    => $status,
                    'message'   => $message,
                    'data'      => $data
                ];
                break;
            default:
                $response = [
                    'status'    => $status,
                    'message'   => $message,
                    'errors'    => $errors
                ];
                break;
        }
        return $response;
    }

    public static function toJson($response, $statusCode = 200)
    {
        return response()->json($response, $statusCode);
    }

    public static function urlPathStorage($path)
    {
        return $path != null ? (substr($path, 0, 4) == 'http' ? $path : Storage::url($path)) : null;
    }

    public static function validatorError($errors)
    {
        return [
            'status' => false,
            'message' => 'Validator Error',
            'errors' => $errors
        ];
    }
}
