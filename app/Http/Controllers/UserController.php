<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminRequest;
use App\Http\Requests\User\LoginRequest;
use App\Http\Requests\User\StoreRequest;
use App\Http\Requests\User\UpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function index()
    {
        $user=User::all();
        return view('user.users')->with('data',$user);
    }

    public function create()
    {
        return view('user.create');
    }

    public function store(StoreRequest $request)
    {
        User::create($request->validated());
        redirect()->route('products.index')->with('data',['success'=>true,'message'=>'Пользователь создан']);
    }

    public function show(User $user)
    {
        return view('user.show')->with('data',$user);
    }

    public function edit(AdminRequest $request,User $user)
    {
        return view('user.edit')->with('data',$user);
    }

    public function update(UpdateRequest $request, User $user)
    {
        $user->update($request->validated());
        return  redirect()->route('products.index')->with('data',['success'=>true,'message'=>'Данные пользователя изменены']);
    }

    public function destroy(AdminRequest $request,User $user)
    {
        $user->delete();
        return  redirect()->route('products.index')->with('data',['success'=>true,'message'=>'Пользователь удален']);
    }

    public function signin(){
        return view('user.signin');
    }

    public function login(LoginRequest $request){
        if(Auth::attempt($request->only(['email','password']))){
            return redirect()->route('info')->with('data',['success'=>true,'message'=>'Вы авторизировались']);
        }
        else{
            return redirect()->route('signin')->with('data',['success'=>false,'message'=>'Не удалось авторизироваться']);
        }
    }

    public function logout(){
        if(Auth::check()){
            Auth::logout();
        }
        return redirect()->route('info')->with('data',['success'=>true,'message'=>'Вы вышли из системы']);
    }
}
