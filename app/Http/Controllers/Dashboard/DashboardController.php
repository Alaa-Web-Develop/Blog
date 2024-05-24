<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index(){
     
        $data['postsCount']=DB::table('posts')->count();
        $data['commentsCount']=DB::table('comments')->count();
        $data['latestPosts']=Post::latestsPosts();
       //dd( $data['latestPosts']);

        return view('dashboard.admindash', $data);
    }
}
