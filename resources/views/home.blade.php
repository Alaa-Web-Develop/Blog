@extends('front.layouts.app')

@section('content')
    <!-- Detail Start -->
    <div class="container py-2">
        <div class="row pt-2">

            {{-- =====================col left ================================--}}

            <div class="col-lg-8">
                @foreach ($getRecord as $value)
                <div>
                    <div class="d-flex flex-column text-left mb-3">
                        <a href="{{route('front.postdetails',$value->id)}}">
                            <img class="img-fluid rounded w-100 mb-4" src="{{asset('storage/'.$value->image)}}" height="auto" alt="Image">

                        </a>
                   <a href="{{route('front.postdetails',$value->id)}}">
                    <h3 class="mb-3">{{$value->title}}</h3>

                   </a>
                        <div class="d-flex">
                            <p class="mr-3"><i class="fa fa-user text-primary"></i> Author: {{$value->user_name}} |</p>
                            <p class="mr-3">{{date('M d, Y ',strtotime($value->created_at))}} |</p>
                            <p class="mr-3"><i class="fa fa-eye text-3 mr-1"></i> 32 |</p>
                            <p class="mr-3"><i class="bi bi-chat-dots"></i> {{$value->getCommentCount()}} </p>
                        
                        </div>
                    </div>
                    <div class="mb-5">
                      
                        <p>{!! strip_tags(Str::substr($value->content, 0, 300)) !!}..</p>
                    <a href="{{route('front.postdetails',$value->id)}}" class="a-readmore">Read More <i class="bi bi-chevron-right icon-read"></i></a>
                    </div>
                </div>    

                <hr>

                @endforeach

                <div class="d-flex justify-content-center">
                    {{$getRecord->withQueryString()->links()}}

                </div>

            </div>


            {{-- =====================col right ================================--}}
            <div class="col-lg-4 mt-5 mt-lg-0">
          
                <!-- Search Form -->
                <div class="mb-5">
                    <form action="{{url('/')}}">
                        <div class="input-group">
                            <input type="text" name="srchpost" class="form-control form-control-lg" placeholder="Keyword">
                            <div class="input-group-append">
                                <button class="input-group-text bg-transparent text-primary"><i
                                        class="fa fa-search"></i></button>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- Category List -->
                <div class="mb-5">
                    <h2 class="mb-4">Categories</h2>
                    <ul class="list-group list-group-flush">

                        @foreach ($categories as $category )
                        <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                            <a href="{{route('front.getCategoryPost',$category->id)}}">{{$category->name}}</a>
                            <span class="badge badge-primary badge-pill">{{$category->totalPost()}}</span>
                        </li>
                        @endforeach
                    
                     
                    </ul>
                </div>

                <hr>
                <!-- Tag Cloud -->
               
                <div class="mb-5">
                    <h2 class="mb-4">Tags</h2>
                    <div class="d-flex flex-wrap m-n1">
                        @foreach ($tags as $tag)
                        <a href="#" class="btn btn-outline-primary m-1 a-tag">{{$tag->name}}</a>  
                        @endforeach
                    </div>
                </div>
              
            </div>
        </div>
    </div>
    <!-- Detail End -->
@endsection

  