<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

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
            // if (Auth::check()) {
            Gate::authorize('isAdmin'); 
                
                return view('dashboard');
            // if (Gate::allows('isAdmin')) {
                
            // }else{
            //     echo 'your not admin';
            // }
            // }
            // return redirect()->route('login')->withErrors(['error' => 'Please login first']);
        }
        public function logout(){
            Auth::logout();
            return redirect()->route('login');
        }

        public function inner(){
            return view('inner');
        }

        public function identify(){
            if(Auth::id()){
                return view('dashboard');
            }else{
                return view('welcome');

            }
        }


        public function ViwProfile($id)
        {

            // Gate::authorize('viw-profile',$id);
            // if (Gate::allows('viw-profile', $id)) {
            if (Gate::any(['viw-profile'], $id)) {
             $user  = User::findorfail($id);
             return $user;
            }else{
        
            return "Access denied!";
            }
        }
        public function ViwPost($id){
            
            $users = Post::where('user_id',$id)->get();
            if ($users) {
                return view('posts',compact('users'));
            }else{
                'no data found';
            }
            
            // return view('posts');


        }

        public function UpdatePost($id){
            $post = Post::find($id);
            $targetUser  = $post->user_id;
                Gate::authorize('update-profile',$targetUser);
                return Post::findorfail($id);
        }
}
