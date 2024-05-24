<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index(){
        $tags=Tag::paginate(3);
        return view('dashboard.tag.index',compact('tags'));
        
    }
}
