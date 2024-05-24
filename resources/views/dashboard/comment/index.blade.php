

@extends('layouts.layout')

@section('title','Comments List')

@section('content')

@if (session()->has('success'))
    <div class="alert alert-success">{{session('success')}}</div>  
@endif
<div class="card">
    <div class="card-body mb-2">
                <h2 class="card-title">
                  comments List</h2>
                </div>          

      <!-- Table with hoverable rows -->
      <table class="table table-striped text-center">
        <thead class="thead-dark">
          <tr>
            <th scope="col">#</th>
            <th scope="col">comment</th>
            <th scope="col">Name</th>
            <th scope="col">Created-at</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>
             @forelse ($comments as $comment )
            <tr>
                <td>{{$comment->id}}</td>
              
                <td>{{$comment->comment}}</td>
                <td>{{$comment->name}}</td>
               
                <td>{{date('d/m/Y H:i A',strtotime($comment->created_at))}}</td>
                <td>
                <a href="{{route('front.home',$comment->id)}}"><i class="bi bi-trash text-danger"></i></a>
                <a href="{{route('front.home',$comment->id)}}"><i class="bi bi-pencil-fill text-info" style="margin-left: 10px"></i></a>    

                </td>
              </tr>
            @empty
            <tr>
                <td colspan="100%">No comments Found...!</td>
            </tr>
            @endforelse
      
        </tbody>
      </table>
      <div class="d-flex justify-content-center mt-3">
        {{$comments->withQueryString()->links()}}

      </div>
     
    


    </div>
  </div>

  @endsection