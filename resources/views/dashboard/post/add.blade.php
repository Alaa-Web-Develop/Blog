@extends('layouts.layout')

@section('title', 'Add Post')

@push('styles')

<!-- summernote -->
<link rel="stylesheet" href="{{asset('AdminDashboardAssets/plugins/summernote/summernote-bs4.min.css')}}">
  
@endpush
@push('styles')
<link rel="stylesheet" href="{{asset('AdminDashboardAssets/plugins/bootstraptagsinput/bootstrap-tagsinput.css')}}">
@endpush


@section('content')

    <div class="card">
        <div class="card-body">

            <h5>Add New Post</h5>
          
        
            <form action="{{route('dashboard.post.insert')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="">Title<span class="text-danger">*</span></label>
                    <input type="text" name='title' class="form-control" value="{{ old('title') }}" required">

                    <div style="color: red">{{ $errors->first('title') }}</div>
                </div>

                <div class="form-group">
                    <label for="">Image</label>
                    <input type="file" name='image' class="form-control" value="{{ old('image') }}" ">

                    <div style="color: red">{{ $errors->first('image') }}</div>
                </div>


                <div class="form-group">
                    <label for="status">status<span class="text-danger">*</span></label>
                    <select name="status" class="form-control" id="status">

                        <option value="">selected</option>
                        <option value="active">active</option>
                        <option value="inactive">In active</option>
                    </select>

                    <div style="color: red">{{ $errors->first('status') }}</div>
                </div>

                <div class="form-group">
                    <label for="category_id">category<span class="text-danger">*</span></label>
                    <select name="category_id" class="form-control" id="category_id">
                        
                        @foreach ($categories as $category )
                        <option value="{{$category->id}}">{{$category->name}}</option> 
                        @endforeach
                       
                     
                    </select>

                    <div style="color: red">{{ $errors->first('category_id') }}</div>
                </div>

                <div class="form-group">
                    <label for="user_id">Author<span class="text-danger">*</span></label>
                    <select name="user_id" class="form-control" id="user_id">

                        @foreach ($users as $user )
                        <option value="{{$user->id}}">{{$user->name}}</option>  
                        @endforeach
                     
                    </select>

                    <div style="color: red">{{ $errors->first('user_id') }}</div>
                </div>



                <div class="form-group">
                    <label for="">Content<span class="text-danger">*</span></label>
                    <textarea name="content" class="form-control" id="summernote"  required >{{ old('content') }}</textarea>

                    <div style="color: red">{{ $errors->first('content') }}</div>
                </div>


                {{-- value="{{ old('tags') }}" --}}
                <div class="form-group"> 
                    <label for="tags">Tags<span class="text-danger">*</span></label>
                    <input type="text" name='tags' id="tags" class="form-control" required">

                    <div style="color: red">{{ $errors->first('tags') }}</div>
                </div>


                <div class="form-group">
                    <button type="submit" class="btn btn-sm btn-primary"><i class="bi bi-floppy-fill"></i> Save</button>
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

@push('scripts')
<script src="{{asset('AdminDashboardAssets/plugins/bootstraptagsinput/bootstrap-tagsinput.js')}}"></script>

{{-- <link rel="stylesheet" href="{{asset('AdminDashboardAssets/plugins/jquery-3.7.1.js')}}"> --}}

<script type="text/javascript">
    $("#tags").tagsinput();
</script>
@endpush