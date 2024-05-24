

@extends('layouts.layout')

@section('title','Media List')

@section('content')

<div class="card">
    <div class="card-body mb-2">
                <h2 class="card-title">
                  media List</h2>
                </div>          

                <div class="row">
                  @foreach ($data as $item )
                <div class="col">
                  <div class="card mb-2">
                    <div class="card-title">
                      <h4>{{$item->post_name}}</h4>
                    </div>
                    <div class="card-body">
                      <img src="{{asset('storage/'.$item->post_image)}}" style="width:244px;height:147px;" alt="">
                    </div>
                    <div>
                    
                    </div>
                   </div>
                </div>
                @endforeach
                </div>
   
   
     
    


    </div>
  </div>

  @endsection