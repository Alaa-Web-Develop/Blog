<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index(){
        $comments=Comment::paginate(3);
        return view('dashboard.comment.index',compact('comments'));
    }

    //Store commnt handeled in Front side and Homecontroller
   
}
