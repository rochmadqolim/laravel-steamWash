<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Kendaraan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function main(Request $request) {
        $logs = Kendaraan::where('pemilik_id', Auth::user()->id);
        
        $count = $logs->count();
        if ($request->has('search') && !empty($request->get('search'))) {
            $logs = $logs->where('no_polisi', 'LIKE', '%' . $request->get('search') . '%')->orWhere('no_transaksi', 'LIKE', '%' . $request->get('search') . '%');
        }
    
        $logs = $logs->where('pemilik_id', Auth::user()->id)->orderBy('id', 'asc')->get();
    
        return view('dashboard', ['logs' => $logs, 'count' => $count]);
    }
    
    

    public function form(){

        $category = Category::all();

        return view('form', ['category' => $category]);
    }

    public function user(){

        $user = User::all();

        return view('user', ['user' => $user]);
    }

    public function login(){
        return view('layouts.login');
    }
    
    public function register(){
        return view('layouts.register');
    }
}