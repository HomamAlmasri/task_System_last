<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterdUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\File;
use Illuminate\Validation\Rules\Password;

class RegisterdUserController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RegisterdUserRequest $request)
    {
        $userAttributes = $request->validated();
        $user =  User::create($userAttributes);
        // $logoPath =  $request->logo->store('logo');
        Auth::login($user);
        return redirect('/task')->with('Sucess', 'Login Successful');
    }
}
