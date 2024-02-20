<?php

namespace App\Http\Requests\Category;

use App\Http\Requests\WebRequest;
use Illuminate\Support\Facades\Auth;

class StoreRequest extends WebRequest
{
    public function authorize(): bool
    {
        $user = Auth::user();

        if ($user->role === 'admin' || $user->role === 'moder') {
            return true;
        }

        return false;
    }

    public function rules(): array
    {
        return [
            "name"=>["required","string","max:255"],
        ];
    }
}
