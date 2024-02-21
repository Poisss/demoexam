<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Auth;

class AdminRequest extends WebRequest
{
    public function authorize(): bool
    {
        $user = Auth::user();

        if ($user->role === 'admin' || $user->role === 'moder') {
            return true;
        }

        return false;
    }
}
