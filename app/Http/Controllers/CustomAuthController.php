<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Hash;
use Session;

class CustomAuthController extends Controller
{
   public function login(){
    return view("auth.login");

   }
   public function signup(){
    return view("auth.signup");
    }
    public function signupUser(Request $request){
     
        $request->validate([
            'name'=>'required',
            'email'=>'required|unique:users',
            'password'=>'required',
        ]);
        $user=new User();
        $user->name=$request->name;
        $user->email=$request->email;
        $user->dob=$request->dob;
        $user->password=Hash::make($request->password);
        // $user->name=$request->name;
        // $user->name=$request->name;
        $res=$user->save();
        if($res){
            echo("Sucessfully Registerd..");
            // return back()->with('sucsess','You have registerd sucessfully..');
        }
        else{
            dd("test");


        }
    }
    public function loginUser(Request $request){
        $request->validate([
            'name'=>'required',
            'password'=>'required',
        ]);
        $user=User::where('name','=',$request->name)->first();
        if($user){
            if(Hash::check($request->password,$user->password)){
                $request->session()->put('loginId',$user->id);
                return redirect('dashboard');
            }
        }
        else{
            echo "Something is wrong";
        }

    }
    public function dashboard(){
        $data=array();
        if(Session::has('loginId')){
            $data=User::where('id','=',Session::get('loginId'))->first();

        }
        return view('dashboard',compact('data'));
    }
    public function logout(){
        if(Session::has('loginId')){
            Session::pull('loginId');
            return redirect('login');
        }

    }
    // public function postCreatePost(Request $request){
    //     $post = new Post();
    //     $post->body = $request['body'];
    //     $request->user()->posts()->save($post);
    //     return redirect()->route('dashboard');
    //     // if ($request->user()->posts()->save($post)) {
    //     //     $message = 'Post successfully created!';
    //     // }
    // }
}
