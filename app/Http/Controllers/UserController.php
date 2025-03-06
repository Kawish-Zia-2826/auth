<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function register(Request $req){
                $data = $req->validate([
                    'name'=>'required',
                    'email'=>'required|email',
                    'password'=>'required|confirmed'
                ]);

                $user = User::create($data);
                if ($user) {
                    return redirect()->route('login');
                }
        }

        public function login(Request $req){
            $credential = $req->validate([
                'password'=>'required',
                'email'=>'required|email',
                
            ]);
            if (Auth::attempt($credential)) {
               return redirect()->route('dashboard');
            }else{
                return redirect()->route('login');
            }
        }
        public function dashboardPage(){
            if (Auth::check()) {
                return view('dashboard');
            }
            return redirect()->route('login')->withErrors(['error' => 'Please login first']);
        }
        public function logout(){
            Auth::logout();
            return redirect()->route('login');
        }
}
