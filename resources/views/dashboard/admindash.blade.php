@extends('layouts.layout')

@section('title','Admin')

@section('content')
<div class="row">
   
        <div class="col">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <h3>{{$postsCount}}</h3>

              <p>Total Posts</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->

        <div class="col">
            <!-- small box -->
            <div class="small-box bg-primary">
              <div class="inner">
                <h3>{{$commentsCount}}</h3>
  
                <p>Total comments</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

</div>

<div class="card-body mb-2" style="background-color: gainsboro">
  <h5 class="card-title">
    Latest Posts</h5>
  <a href="{{route('dashboard.post.index')}}" class="btn btn-primary btn-sm float-right"> View Posts</a>
  
</div>

<div class="row">
  <div class="col">
    <table class="table shadow p-2">
      <thead class="table-dark">
        <tr>
          <th>#id</th>
          <th>#Title</th>
          <th>Author</th>
          <th>Category</th>
          <th>Active</th>
          <th>Comments</th>
          <th>Views</th>
          <th>Created_at</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        @forelse ($latestPosts as $item )
          <tr>
            <td>{{$item->id}}</td>
            <td>{{$item->title}}</td>
            <td>{{$item->user_name}}</td>
            <td>{{$item->category_name}}</td>
            <td>{{$item->status}}</td>
            <td>{{$item->getCommentCount()}}</td>
            <td>20</td>
            
            <td>{{$item->created_at}}</td>
            <td>
              <a href="{{route('dashboard.post.delete',$item->id)}}"><i class="bi bi-trash text-danger"></i></a>
                <a href="{{route('dashboard.post.edit',$item->id)}}"><i class="bi bi-pencil-fill text-info" style="margin-left: 10px"></i></a>  
            </td>

          </tr>
        @empty
          <tr>
            <td colspan="100%">No items to show....!</td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>
</div>
@endsection