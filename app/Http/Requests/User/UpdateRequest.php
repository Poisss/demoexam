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
            
        ];
    }
}
