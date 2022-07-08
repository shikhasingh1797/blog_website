<?php

namespace App\Http\Controllers;
use App\Post;
use App\User;
use Illuminate\Http\Request;
use DB;
use Session;
use App\Models\Posts;
use App\Tags;
use App\Models\Category;
use Response;
use App\Http\CategoryController;


class PostController extends Controller
{
    //
    public function postCreatePost(Request $request){
        $user_id = session('loginId');
        
        $post = new Post();
        $post->title = $request['title'];
        $post->body = $request['body'];
        $post->user_id =$user_id;

        $data=User::where('id','=',Session::get('loginId'))->first();




        $post->save();
        echo ("Posted Successfully..");
        // return redirect('dashboard');
    }
    public function getAllPosts(Request $request){
        $allPosts=DB::select('select posts.*, users.id,users.name,users.email from users left join posts on users.id=posts.user_id where user_id is not null');
        return $allPosts;
        // return view('welcome',['allPosts'=>$allPosts]);   By uncomment this you can see it in frontent 

        
    }

    public function index(){
       $post=Post::with('category')->get();

       return Response::json(["status"=>"RXSUCCESS", "message"=>"Post data", "data"=>$post],200);
    }
    public function postuser(){
        $post=Post::with('user')->get();
 
        return Response::json(["status"=>"RXSUCCESS", "message"=>"Post data", "data"=>$post],200);
     }

    public function postcomment(){
        $post=Post::with('comment')->get();

       return Response::json(["status"=>"RXSUCCESS", "message"=>"Post data", "data"=>$post],200);

    }
    public function posttag(Request $request){
          $query = $request['query'];
          $query=$query==null?"%":$query."%";
        // $query= $request->query('title');
        // $query= $request->query('body');
        // $query= $request->query('id');
        $post=Post::with('user','tag','category','comment')->where('title' , 'like' , $query)->orWhere('body' , 'like' , $query)->get();

       return Response::json(["status"=>"RXSUCCESS", "message"=>"Post data", "data"=>$post],200);

    }
    public function getpostbytag(){
        $post = Tags::with('post')->get();
        return Response::json(["status"=>"RXSUCCESS", "message"=>"Post data by tag", "data"=>$post],200);
    }
    
}
