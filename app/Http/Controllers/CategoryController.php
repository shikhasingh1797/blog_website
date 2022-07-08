<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Response;

class CategoryController extends Controller
{
    //
    public function postbycategory(){
        $category=Category::with('getpostsbycategory')->get();
 
        return Response::json(["status"=>"RXSUCCESS", "message"=>"Post data", "category"=>$category],200);
     }
}
