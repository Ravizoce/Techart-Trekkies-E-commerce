<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "email" => "required|email",
            "password" => "required|min:8|max:16",
        ];
    }


    public function authenticate()
    {

        $credentials = $this->only('email', 'password');
        $remember = $this->has('remember');
        if (Auth::attempt($credentials, $remember)) {
            return;    
        }


        throw ValidationException::withMessages([
            'password' => trans('auth.failed'),
        ]);
    }
}
