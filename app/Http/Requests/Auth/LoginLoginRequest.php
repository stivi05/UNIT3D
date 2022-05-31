<?php

declare(strict_types=1);

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class LoginLoginRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            $this->username() => 'required|string',
            'password'        => 'required|string',
            'captcha'         => 'hiddencaptcha',
        ];
    }
}
