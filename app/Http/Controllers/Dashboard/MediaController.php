<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MediaController extends Controller
{
    public function index(){
        $data=Post::postsMedia();
        return view('dashboard.media.index',compact('data'));
    }
}
