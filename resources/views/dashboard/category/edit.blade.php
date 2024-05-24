@extends('layouts.layout')

@section('title', 'Edit Category')

@section('content')

    <div class="card">
        <div class="card-body">

            <h5>Edit Category</h5>
          
        
            <form action="{{route('dashboard.category.update',$getRecord->id)}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="">Name<span class="text-danger">*</span></label>
                    <input type="text" name='name' class="form-control" value="{{ $getRecord->name }}" required">

                    <div style="color: red">{{ $errors->first('name') }}</div>
                </div>

                <div class="form-group">
                    <label for="status">status<span class="text-danger">*</span></label>
                    <select name="status" class="form-control" id="status">

                        <option value="">selected</option>
                        <option value="active" {{ $getRecord->status == 'active' ? 'selected' :'' }}>active</option>
                        <option value="inactive" {{$getRecord->status == 'inactive' ? 'selected' :'' }}>In active</option>
                    </select>

                    <div style="color: red">{{ $errors->first('status') }}</div>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-sm btn-primary"><i class="bi bi-floppy-fill"></i> Edit</button>
                </div>

            </form>
        </div>
      </div>
    @endsection
