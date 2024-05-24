

@extends('layouts.layout')

@section('title','Category List')

@section('content')

@if (session()->has('success'))
    <div class="alert alert-success">{{session('success')}}</div>  
@endif
<div class="card">
    <div class="card-body mb-2">
                <h5 class="card-title">
                    Category List</h5>
                <a href="{{route('dashboard.category.add')}}" class="btn btn-primary btn-sm float-right"><i class="bi bi-plus-circle"></i> Add Category</a>

      <!-- Table with hoverable rows -->
      <table class="table table-striped">
        <thead class="thead-dark">
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Active</th>
            <th scope="col">Created Date</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>
            @forelse ($getRecord as $category )
            <tr>
                <td>{{$category->id}}</td>
                <td>{{$category->name}}</td>
                <td><input type="checkbox" {{$category->status == 'active' ?'checked' : ''}}></td>
                <td>{{date('d/m/Y H:i A',strtotime($category->created_at))}}</td>
                <td>
                <a href="{{route('dashboard.category.delete',$category->id)}}"><i class="bi bi-trash text-danger"></i></a>
                <a href="{{route('dashboard.category.edit',$category->id)}}"><i class="bi bi-pencil-fill text-info" style="margin-left: 10px"></i></a>    

                </td>
              </tr>
            @empty
            <tr>
                <td colspan="5">No categories Found...!</td>
            </tr>
            @endforelse
      
        </tbody>
      </table>
     
      {{$getRecord->withQueryString()->links()}}


    </div>
  </div>

  @endsection