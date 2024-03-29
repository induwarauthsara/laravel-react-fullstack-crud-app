<?php

namespace App\Http\Requests;

use Illuminate\Console\View\Components\Confirm;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Password;

class SignupRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'requested|string|max:55',
            'email' => 'requested|email|unique:users,email',
            'password' => [
                'requested',
                'confirmed',
                Password::min(8)
                    ->letters()
                    ->mixedCase()
            ]

        ];
    }
}
