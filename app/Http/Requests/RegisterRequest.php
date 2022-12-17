<?php

namespace App\Http\Requests;

use App\Services\ResponseService;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name'                  => 'required',
            'email'                 => 'required|email|unique:user,email',
            'password'              => 'required|min:6|confirmed',
            'password_confirmation' => 'required'
        ];
    }

    public function vailedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            response()->json(ResponseService::validatorError($validator->errors()), 422)
        );
    }
}
