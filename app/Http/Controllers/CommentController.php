<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use Session;
class CommentController extends Controller
{
    //
    public function getcomment(Request $request)
    {
        return view("auth.comment");
    } 
    


    public function postcomment(Request $request){
        $user_id = session('loginId');
        $post_id = session('id');

        $comment = new Comment();
        $comment->user_id = $user_id;
        $comment->post_id = $post_id;
        $comment->comment = $request['comment'];


        dd($request->all());
        $comment->save();
        echo ("Comment Posted Successfully..");

    }
}
