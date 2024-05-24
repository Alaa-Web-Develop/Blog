<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Coderflex\Laravisit\Concerns\CanVisit;
use Coderflex\Laravisit\Concerns\HasVisits;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model implements CanVisit
{
    use HasFactory;
    use HasVisits;
    
    
    protected $fillable=['name', 'status','is_deleted'];
    protected $table='categories';

    public static function getRecordCategory(){
        return Category::select('categories.*')->where('status','=','active')->orderBy('id','desc')
        ->paginate(4);
    }
    public static function getSingle($id){
       return Category::find($id);
    }

    public function totalPost(){
        return $this->hasMany(Post::class,'category_id')->count();
    }

  }
