<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Tag;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index()
    {
        $data['getRecord'] = Post::getRecordPost();

$data['viewpost']=Post::popularLastDays(10)->get();
      

        return view('dashboard.post.index', $data);
        
    }

    public function add()
    {
        $data['categories']=Category::getRecordCategory();
        $data['users']=User::all();


        return view('dashboard.post.add',$data);
    }

    public function insert(Request $request)
    {
       //dd($request->all());
      //'title', 'content','image','user_id','category_id','tags','status','viewsCount'
      //
        
        //validation
        $request->validate([
            'title' => 'required|string|min:3|max:255',
            'content' => 'required|string|min:3|max:255',
            'user_id'=>'nullable|int|exists:users,id',
           'category_id'=>['nullable','int','exists:categories,id'],
           'image'=>['image','max:1048576','dimensions:min_width=50,min_height=100'],
           'status'=>'in:active,inactive'
        ]);
    
        $data=$request->except('image');
        $newImg = $this->uploadImage($request);
        if($newImg){
            $data['image']=$newImg;
        }

        $returnCreated = Post::create($data);
        $latestItem = DB::table('posts')->latest('id')->first();
        //dd($latestItem->id);

        //dd($returnCreated);

  //Add-update Tags in posts
  Tag::InsertDeleteTags($latestItem->id,$request->tags);

       return redirect()->route('dashboard.post.index')->with('success', 'Post created successfully...!');
       //return redirect('dashboard/post')->with('success', 'Post created successfully...!');
    }

    public function edit($id)
    {
        //dd($id);
        $data['getRecord'] = Post::getSingle($id);
        $data['categories']=Category::getRecordCategory();
        $data['users']=User::all();

        return view('dashboard.post.edit', $data);
    }

    public function update(Request $request, $id)
    {
        //dd($id);
           //validation
            //validation
        $request->validate([
            'title' => 'required|string|min:3|max:255',
            'content' => 'required|string|min:3|max:255',
            'user_id'=>'nullable|int|exists:users,id',
           'category_id'=>['nullable','int','exists:categories,id'],
           'image'=>['image','max:1048576','dimensions:min_width=50,min_height=100'],
           'status'=>'in:active,inactive'
        ]);
    

        $post = Post::find($id);
        $oldImg = $post->image;

        $data=$request->except('image');
        $newImg=$this->uploadImage($request);
        if($newImg){
            $data['image']=$newImg;
        }

        $post->update($data);

        //Add-update Tags in posts
        Tag::InsertDeleteTags($post->id,$request->tags);
        //Delete old Img:
        if($oldImg && $newImg){
            Storage::disk('public')->delete($oldImg);
        }

        return redirect()->route('dashboard.post.index')->with('success', 'Post updated successfully...!');
    }

    public function delete($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        if($post->image){
            Storage::disk('public')->delete($post->image);

        }
        //$post->delete();


        return redirect()->route('dashboard.post.index')->with('success', 'Post deleted successfully...!');
    }


        //upload image
        protected function uploadImage(Request $request){
            if($request->hasFile('image')){
                $file=$request->file('image');
                $path=$file->store('uploads',['disk'=>'public']);

                return $path;
            }
        }
       
}
