<?php

namespace App\Http\Controllers;
use App\Post;
use App\User;
use Illuminate\Http\Request;
use DB;

class PostController extends Controller
{
    //
    public function postCreatePost(Request $request){
        // print_r($request->all());
        $user_id = session('loginId');
        
        $post = new Post();
        $post->title = $request['title'];
        $post->body = $request['body'];
        $post->user_id =$user_id;
        $data=User::where('id','=',Session::get('loginId'))->first();


        // print_r($request->all());


        // $body1=strip_tags($request->body1);

        // dd($request->all());
        $post->save();
        echo ("Posted Successfully..");
        // return redirect('dashboard');
    }
    public function getAllPosts(Request $request){
        $allPosts=DB::table('posts')->get();
        return view('welcome',['allPosts'=>$allPosts]);

        
    }
}
