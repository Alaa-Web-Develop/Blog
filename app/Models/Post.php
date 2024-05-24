<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;
use Coderflex\Laravisit\Concerns\CanVisit;
use Coderflex\Laravisit\Concerns\HasVisits;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model implements CanVisit
{
    use HasFactory;
    use HasVisits;
    
    protected $fillable=['title', 'content','image','user_id','category_id','tags','status','viewsCount','created_at','updated-at'];
 
    

    public static function getRecordPost(){
     return self::select('posts.*','users.name as user_name','categories.name as category_name')
     ->join('users','users.id','=','posts.user_id')
     ->join('categories','categories.id','=','posts.category_id')
     //->join('comments','comments.post_id','=','posts.id')
     ->orderby('posts.id','desc')
     //->get();
     ->paginate(4);
    }

    public static function getRecordFront(){
        $return = self::select('posts.*','users.name as user_name','categories.name as category_name')
        ->join('users','users.id','=','posts.user_id')
        ->join('categories','categories.id','=','posts.category_id');

        if(!empty(Request::get('srchpost'))){
            $return=$return->where('posts.title','like','%'.Request::get('srchpost').'%');
        };

        //->join('comments','comments.post_id','=','posts.id')
        $return=$return->orderby('posts.id','desc') ->paginate(4);

        return $return;
       }

    public static function getSingle($id){
        return Post::find($id);  
    }
    public static function getSinglePostDetails($id){
        return self::select('posts.*','users.name as user_name','categories.name as category_name')
        ->join('users','users.id','=','posts.user_id')
        ->join('categories','categories.id','=','posts.category_id')
        ->where('posts.id','=',$id)
        //->join('comments','comments.post_id','=','posts.id')
        ->orderby('posts.id','desc')
        ->first();
        
    }

    public static function getCategoryPosts($id){
        return self::select('posts.*','users.name as user_name','categories.name as category_name')
        ->join('users','users.id','=','posts.user_id')
        ->join('categories','categories.id','=','posts.category_id')
        ->where('categories.id','=',$id)
        ->where('categories.status','=','active')
        ->get();
    }

    public function getTag(){
        return $this->hasMany(Tag::class,'post_id');
    }
   
    public function getComment(){
        return $this->hasMany(Comment::class,'post_id');
    }

    public function getCommentCount(){
        return $this->hasMany(Comment::class,'post_id')->count();
    }

    public static function latestsPosts(){
        return self::select('posts.*','users.name as user_name','categories.name as category_name')
        ->join('users','users.id','=','posts.user_id')
        ->join('categories','categories.id','=','posts.category_id')
        ->join('comments','comments.post_id','=','posts.id')
        ->orderby('created_at','desc')
        ->limit(4)
        ->get();    
    }

    public static function postsMedia(){
        return self::select('posts.title as post_name','posts.image as post_image')
        ->join('medias','post_id','=','medias.post_id')
        ->get();
    }
}
//$postcomments=Post::withCount('comments')->get();