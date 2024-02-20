<?php

namespace App\Http\Requests\User;

use App\Http\Requests\WebRequest;

class LoginRequest extends WebRequest
{
    public function rules(): array
    {
        return [
            'login'=>[]
        ];
    }
}
