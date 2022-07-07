<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use Session;
use DB;
class CommentController extends Controller
{
    //
    public function getcomment(Request $request,$id)
    {
        // return view("auth.comment",["id"=>$id]);
        $allComments=DB::select('select * from comments where post_id=:id',["id"=>$id]);
        // dd($allComments);
        return view('auth.comment',["id"=>$id],['allComments'=>$allComments]);
    } 
    


    public function postcomment(Request $request,$id){

        $user_id = session('loginId');
        
        $comment = new Comment();
        $comment->user_id = $user_id;
        $comment->post_id = $request['post_id'];
        $comment->comment = $request['title'];

        $comment->save();
        echo ("Comment Posted Successfully..");
        // return redirect('comment/'.$id);      **********************************************************************************This is for frontent page

    }
    // public function getAllComments(Request $request,$id){
    //     $allComments=DB::table('comments')->get();
    //     return view('auth.comment',['allComments'=>$allComments]);

        
    // }
}
