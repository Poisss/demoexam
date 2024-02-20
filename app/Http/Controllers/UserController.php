<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }

    public function login(){

    }

    public function logup(){

    }

    public function logout(){
        if(Auth::check()){
            Auth::logout();
        }
        return redirect()->route('info')->with('data',['success'=>true,'message'=>'Вы вышли из системы']);
    }
}
