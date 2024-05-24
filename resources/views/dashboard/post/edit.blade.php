@extends('layouts.layout')

@section('title', 'Edit Post')

@push('styles')

<!-- summernote -->
<link rel="stylesheet" href="{{asset('AdminDashboardAssets/plugins/summernote/summernote-bs4.min.css')}}">
  
@endpush


@section('content')

    <div class="card">
        <div class="card-body">

            <h5>Edit Post</h5>
          
        
            <form action="{{route('dashboard.post.update',$getRecord->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="">Title<span class="text-danger">*</span></label>
                    <input type="text" name='title' class="form-control" value="{{ $getRecord->title }}" required">

                    <div style="color: red">{{ $errors->first('title') }}</div>
                </div>

                <div class="form-group">
                    <label for="">Image</label>
                    <input type="file" name='image' class="form-control" value="{{ $getRecord->image }}" ">
                    <img src="{{asset('storage/'.$getRecord->image)}}" height="50" width="50" alt="">
                    <div style="color: red">{{ $errors->first('image') }}</div>
                </div>


                <div class="form-group">
                    <label for="status">status<span class="text-danger">*</span></label>
                    <select name="status" class="form-control" id="status">

                        <option value="">selected</option>
                        <option value="active" {{ $getRecord->status == 'active' ? 'selected':'' }}>active</option>
                        <option value="inactive" {{ $getRecord->status == 'inactive' ? 'selected':'' }}>In active</option>
                    </select>

                    <div style="color: red">{{ $errors->first('status') }}</div>
                </div>

                <div class="form-group">
                    <label for="category_id">category<span class="text-danger">*</span></label>
                    <select name="category_id" class="form-control" id="category_id">
                        
                        @foreach ($categories as $category )
                        <option value="{{$category->id}}" {{$category->id==$getRecord->category_id?'selected':''}}>{{$category->name}}</option> 
                        @endforeach
                       
                     
                    </select>

                    <div style="color: red">{{ $errors->first('category_id') }}</div>
                </div>

                <div class="form-group">
                    <label for="user_id">Author<span class="text-danger">*</span></label>
                    <select name="user_id" class="form-control" id="user_id">

                        @foreach ($users as $user )
                        <option value="{{$user->id}}" {{$user->id==$getRecord->user_id?'selected':''}}>{{$user->name}}</option>  
                        @endforeach
                     
                    </select>

                    <div style="color: red">{{ $errors->first('user_id') }}</div>
                </div>



                <div class="form-group">
                    <label for="">Content<span class="text-danger">*</span></label>
                    <textarea name='content' class="form-control" id="summernote"  required >{{ $getRecord->content}}</textarea>

                    <div style="color: red">{{ $errors->first('content') }}</div>
                </div>


                <div class="form-group">
                    @php
                        $tags='';
                        foreach ($getRecord->getTag as $value) {
                            $tags .= $value->name.',';
                        }
                    @endphp
                    <label for="">Tags<span class="text-danger">*</span></label>
                 
                    <input type="text" name="tags" value="{{$tags}}" class="form-control">

                    <div style="color: red">{{ $errors->first('tags') }}</div>
                </div>


                <div class="form-group">
                    <button type="submit" class="btn btn-sm btn-primary"><i class="bi bi-floppy-fill"></i> Edit</button>
                </div>

            </form>
        </div>
      </div>
    @endsection


@push('scripts')
<!-- Summernote -->
<script src="{{asset('AdminDashboardAssets/plugins/summernote/summernote-bs4.min.js')}}"></script>

<script>
    $(function () {
      // Summernote
      $('#summernote').summernote();})
    </script>     
@endpush