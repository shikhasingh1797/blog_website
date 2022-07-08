<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\User;
use Response;

class UserController extends Controller
{
    //
    // public function add_user
    public function usertag(){
        $post=User::with('tag')->get();

       return Response::json(["status"=>"RXSUCCESS", "message"=>"Post data", "data"=>$post],200);

    }
}
