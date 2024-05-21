<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    //

    public function create(){
        return view('authPage.register');
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users,email',
            'password' => 'required|string|min:8',
        ]);


        // $validatedData['password']= Hash::make($validatedData['password']);

        $user = new User([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => 2, // Role ID default
        ]);

        $user->save();

        // User::create($validatedData);

        return redirect('/login')->with('success', 'berhasil create akun');
    }

}
