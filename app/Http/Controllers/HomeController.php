<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(){
        $data['getRecord']=Post::getRecordFront();
        $data['categories']=Category::all();
        $data['tags']=Tag::all();
   

        return view('home',$data);
    }

    public function postDetails($id){

       $postdetails=Post::getSinglePostDetails($id);
       if(!empty($postdetails)){
        $data['post']=$postdetails;
        $data['categories']=Category::all();
        $data['tags']=Tag::all();

        //dd( $data['post']);
        return view('front.blogdetails',$data);
       }
       else{
        abort(404);
       }

    }

    public function getCategoryPost($id){
        $data['catgrPosts']=Post::getCategoryPosts($id);
        $data['categories']=Category::all();
        $data['tags']=Tag::all();
        return view('front.catgryPosts',$data);
 
    }

    public function postcomment(Request $request){
        //dd($request->all());
        //validation

        Comment::create($request->all());
        return redirect()->back()->with('success','your comment added..!');
    }
}
