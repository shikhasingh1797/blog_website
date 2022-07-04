<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Comment;
use Session;

class CommentController extends Controller
{
    //
    public function getcomment()
    {
        return view("auth.comment");
    }
}
