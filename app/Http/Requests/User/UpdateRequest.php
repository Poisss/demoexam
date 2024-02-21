<?php

namespace App\Http\Requests\User;

use App\Http\Requests\WebRequest;
use Illuminate\Support\Facades\Auth;

class UpdateRequest extends WebRequest
{
    public function authorize(): bool
    {
        $user = Auth::user();

        $userIdFromUrl = $this->route('user');

        if ($user->role === 'admin' || $user->role === 'moder' || $user->id === $userIdFromUrl) {
            return true;
        }

        return false;
    }

    public function rules(): array
    {
        return [
            "name"=>["sometimes","string","max:255","alpha"],
            "surname "=>["sometimes","string","max:255","alpha"],
            "patronymic"=>["nullable","string","max:255","alpha"],
            "login"=>["sometimes","string","max:255","unique:users,login"],
            "email"=>["sometimes","string","max:255","email","unique:users,email"],
            "password"=>["sometimes","string","min:5","max:255"],
        ];
    }
}
