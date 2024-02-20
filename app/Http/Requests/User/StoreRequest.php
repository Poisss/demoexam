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
            "name"=>["required","string","max:255"],
            "name"=>["required","string","max:255"],
            "name"=>["required","string","max:255"],
        ];
    }
}
