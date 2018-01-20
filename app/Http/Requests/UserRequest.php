<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users,email',
            'username' => 'required|unique:users,username',
            'password' => 'required|confirmed',
            'address' => 'required',
            'postcode' => 'required',
            'phone' => 'required',
        ];
    }

    /**
     * Get the proper failed validation response for the request. This is optional.
     *
     * @param  array  $errors
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function response(array $errors)
    {

        $message = [
            'status' => Response::HTTP_UNPROCESSABLE_ENTITY,
            'message' => 'There is a problem with your provided data',
            'error' => $errors
        ];

        return new JsonResponse($message, Response::HTTP_UNPROCESSABLE_ENTITY);

    }
}
