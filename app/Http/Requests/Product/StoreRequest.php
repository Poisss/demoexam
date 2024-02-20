<?php

namespace App\Http\Requests\Product;

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
            "title"=>["required","string","max:255"],
            "price"=>["required","decimal:2"],
            "country"=>["required","string","max:255"],
            "year"=>["required","integer","min:1900","max:".date('Y')],
            "model"=>["required","string","max:255"],
            "qty"=>["required","integer"],
            "image"=>["required","file","mimes:jpg,pdf,png,jfif"],
            "category_id"=>["required","exists:categories,id"],
        ];
    }
}
