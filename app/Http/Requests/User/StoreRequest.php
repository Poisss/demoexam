<?php

namespace App\Http\Requests\User;

use App\Http\Requests\WebRequest;

class StoreRequest extends WebRequest
{
    public function rules(): array
    {
        return [
            "name"=>["required","string","max:255","alpha"],
            "surname "=>["required","string","max:255","alpha"],
            "patronymic"=>["nullable","string","max:255","alpha"],
            "login"=>["required","string","max:255","unique:users,login"],
            "email"=>["required","string","max:255","email","unique:users,email"],
            "password"=>["required","string","min:5","max:255","confirmed"],
        ];
    }
}
