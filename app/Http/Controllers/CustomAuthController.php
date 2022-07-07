<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Hash;
use Session;
use Response;
use Validator;

class CustomAuthController extends Controller
{
   public function login(){
    return view("auth.login");

   }
   public function signup(){
    return view("auth.signup");
    }
    public function signupUser(Request $request){
   

        $validator = Validator::make($request->all(), [
            'name'=>'required',
            'email'=>'required|unique:users',
            'password'=>'required',
        ]);

        if ($validator->fails()) {
            return Response::json(["status"=>"RXERROR", "message"=>"Unable to register", "errors"=>$validator->messages()],400);
        } 

        $user=new User();
        $user->name=$request->name;
        $user->email=$request->email;
        $user->dob=$request->dob;
        $user->password=Hash::make($request->password);
        $res=$user->save();
        if($res){

            // Success : { status:"RXSUCCESS",message:"", data:[] } 
            // Fail    : { status:"RXERROR", message:"", errors:[] } 

            return Response::json(["status"=>"RXSUCCESS", "message"=>"User registered successfully", "data"=>$res],200);
        }
        else{
            return Response::json(["status"=>"RXERROR", "message"=>"Unable to register", "errors"=>$res],400);


        }
    }
    public function loginUser(Request $request){

        $validator = Validator::make($request->all(), [
            'name'=>'required',
            'password'=>'required',
        ]);

        if ($validator->fails()) {
            return Response::json(["status"=>"RXERROR", "message"=>"Unable to register", "errors"=>$validator->messages()],400);
        } 
 
        $user=User::where('name','=',$request->name)->first();
        if($user!=null && Hash::check($request->password,$user->password)){
            return Response::json(["status"=>"RXSUCCESS", "message"=>"User logged in successfully", "data"=> $user ],200);
        }
        return Response::json(["status"=>"RXERROR", "message"=>"Invalid Credentials"],400);
   
        // if($user){
        //     if(Hash::check($request->password,$user->password)){
        //         $request->session()->put('loginId',$user->id);
        //         // return redirect('dashboard');
        //         echo "Login Sucessfully..";
        //     }
        // }
        // else{
        //     echo "Something is wrong";
        // }

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
            // return redirect('login');
        }

    }
}
