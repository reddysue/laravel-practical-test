<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class RegisterRequest extends FormRequest
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
            'name' => 'required',
            'email'=> 'required',
            'password' => 'required|required_with:passwordConfirmation|min:6',
            'passwordConfirmation' => 'required|same:password|min:6'
        ];
    }
    
    protected function failedValidation(Validator $validator)
    {
        $error_text="";
        foreach ($validator->errors()->all() as $error) {
            $error_text .= $error;
        }
        throw new HttpResponseException(response()->json([
            'result' => null,
            'statusCode' => config('http_status.badRequest'),
            'message' => $error_text,
        ], config('http_status.badRequest')));
    }
}
