<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\Login;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'fullname' => 'required',
            'username' => 'required|unique:logins',
            'password' => 'required',
        ]);
        User::create($request->all());

        return redirect('register');
    }

    public function auth(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);
    
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
    
            return redirect('dashboard');
        } else {
            $userExists = User::where('username', $credentials['username'])->exists();
    
            if (!$userExists) {
                return redirect('login')->with('error', 'Username not registered');
            } else {
                return redirect('login')->with('error', 'Invalid username or password');
            }
        }
    }
    

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerate();
        return redirect('login');
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);

        $user->update([
            'fullname' => $request->input('name'),
            'username' => $request->input('username'),
        ]);

        return redirect('user');
    }
}