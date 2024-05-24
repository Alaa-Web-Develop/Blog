@extends('layouts.layout')

@section('title', 'Add Category')

@section('content')

    <div class="card">
        <div class="card-body">

            <h5>Add New Category</h5>
          
        
            <form action="{{route('dashboard.category.insert')}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="">Name<span class="text-danger">*</span></label>
                    <input type="text" name='name' class="form-control" value="{{ old('name') }}" required">

                    <div style="color: red">{{ $errors->first('name') }}</div>
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
                    <button type="submit" class="btn btn-sm btn-primary"><i class="bi bi-floppy-fill"></i> Save</button>
                </div>

            </form>
        </div>
      </div>
    @endsection
