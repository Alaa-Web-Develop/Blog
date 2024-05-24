

@extends('layouts.layout')

@section('title','Tags List')

@section('content')

@if (session()->has('success'))
    <div class="alert alert-success">{{session('success')}}</div>  
@endif
<div class="card">
    <div class="card-body mb-2">
                <h2 class="card-title">
                  tags List</h2>
                </div>          

      <!-- Table with hoverable rows -->
      <table class="table table-striped text-center">
        <thead class="thead-dark">
          <tr>
            <th scope="col">Name</th>
            <th scope="col">Active</th>
            <th scope="col">Created-at</th>
          </tr>
        </thead>
        <tbody>
             @forelse ($tags as $tag )
            <tr>

                <td>{{$tag->name}}</td>
               <td><input type="checkbox" {{$tag->status == 'active' ? 'checked':''}}></td>
                <td>{{date('d/m/Y H:i A',strtotime($tag->created_at))}}</td>
              
              </tr>
            @empty
            <tr>
                <td colspan="100%">No tags Found...!</td>
            </tr>
            @endforelse
      
        </tbody>
      </table>
      <div class="d-flex justify-content-center mt-3">
        {{$tags->withQueryString()->links()}}

      </div>
     
    


    </div>
  </div>

  @endsection