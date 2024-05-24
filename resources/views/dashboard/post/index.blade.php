

@extends('layouts.layout')

@section('title','Posts List')

@section('content')

@if (session()->has('success'))
    <div class="alert alert-success">{{session('success')}}</div>  
@endif
<div class="card">
    <div class="card-body mb-2">
                <h5 class="card-title">
                  Posts List</h5>
                <a href="{{route('dashboard.post.add')}}" class="btn btn-primary btn-sm float-right"><i class="bi bi-plus-circle"></i> Add Post</a>

      <!-- Table with hoverable rows -->
      <table class="table table-striped">
        <thead class="thead-dark">
          <tr>
            <th scope="col">#</th>
            <th scope="col">image</th>
            <th scope="col">title</th>
            <th scope="col">Author</th>
            <th scope="col">Category</th>
            <th scope="col">active</th>
            <th scope="col">comments</th>
            <th scope="col">views</th>
            <th scope="col">created At</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>
             @forelse ($getRecord as $post )
            <tr>
                <td>{{$post->id}}</td>
                <td><img src="{{asset('storage/'.$post->image)}}" height="50" width="50" alt=""> </td>
                <td>{{$post->title}}</td>
                <td>{{$post->user_name}}</td>
                <td>{{$post->category_name}}</td>
                <td><input type="checkbox" {{$post->status=='active'?'checked':''}}/></td>
                <td>{{$post->getCommentCount()}}</td>
                <td>{{$viewpost}}</td>
                <td>{{date('d/m/Y H:i A',strtotime($post->created_at))}}</td>
                <td>
                <a href="{{route('dashboard.post.delete',$post->id)}}"><i class="bi bi-trash text-danger"></i></a>
                <a href="{{route('dashboard.post.edit',$post->id)}}"><i class="bi bi-pencil-fill text-info" style="margin-left: 10px"></i></a>    

                </td>
              </tr>
            @empty
            <tr>
                <td colspan="100%">No posts Found...!</td>
            </tr>
            @endforelse
      
        </tbody>
      </table>
      {{$getRecord->withQueryString()->links()}}
     
    


    </div>
  </div>

  @endsection