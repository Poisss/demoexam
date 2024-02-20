<?php

namespace App\Http\Requests\Product;

use App\Http\Requests\WebRequest;
use Illuminate\Support\Facades\Auth;

class UpdateRequest extends WebRequest
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
            "title"=>["sometimes","string","max:255"],
            "price"=>["sometimes","decimal:2"],
            "country"=>["sometimes","string","max:255"],
            "year"=>["sometimes","integer","min:1900","max:".date('Y')],
            "model"=>["sometimes","string","max:255"],
            "qty"=>["sometimes","integer"],
            "image"=>["sometimes","file","mimes:jpg,pdf,png,jfif"],
            "category_id"=>["sometimes","exists:categories,id"],
        ];
    }
}
