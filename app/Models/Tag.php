<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    protected $fillable=['name', 'status','post_id'];

    public static function InsertDeleteTags($post_id,$tags){
//Delete old tags
Tag::where('post_id','=',$post_id)->delete();
if(!empty($tags)){
    $tagsArr = explode(",",$tags);
    foreach($tagsArr as $tag){

        //save tags in DB:

        $tagtbl = new Tag;
        $tagtbl->post_id=$post_id;
        $tagtbl->name=trim($tag);
        $tagtbl->save();
    }
}
    }

}
