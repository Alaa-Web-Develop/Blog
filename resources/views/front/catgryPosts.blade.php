@extends('front.layouts.app')

@section('content')
    <!-- Detail Start -->
    <div class="container py-2">
        <div class="row pt-2">

            {{-- =====================col left ================================ --}}

            @if (!empty($catgrPosts))
            <div class="col-lg-8">
                @foreach ($catgrPosts as $item )
                <div>
                    <div class="d-flex flex-column text-left mb-3">

                        <img class="img-fluid rounded w-100 mb-4" src="{{asset('storage/'.$item->image) }}" style="max-height: 574px;object-fit:cover;"
                            alt="Image">
                        <h3 class="mb-3">{{$item->title}}</h3>

                        <div class="d-flex">
                            <p class="mr-3"><i class="fa fa-user text-primary"></i> Author: {{ $item->user_name }} |
                            </p>
                            <p class="mr-3">{{ date('M d, Y ', strtotime($item->created_at)) }} |</p>
                            <p class="mr-3"><i class="fa fa-eye text-3 mr-1"></i> 32 |</p>
                            <p class="mr-3"><i class="bi bi-chat-dots"></i> {{$item->getCommentCount()}} </p>

                        </div>
                    </div>
                    <div class="mb-5">

                        <p>
                            {!! $item->content !!}
                        </p>
                        
                    </div>
                </div>
                @endforeach
                    

                       <!-- Tag Cloud -->
                       <div class="mb-5">
                        <h2 class="mb-4">Tags</h2>
                        <div class="d-flex flex-wrap m-n1">
                            @if (!empty($tags))
                            @foreach ($tags as $tag)
                            <a href="#" class="btn btn-outline-primary m-1 a-tag">{{$tag->name}}</a>  
                            @endforeach  
                            @endif
                           
                        </div>
                    </div>


                      <!-- Comment List -->
                      <div class="mb-5">
                        <h2 class="mb-4">{{$item->getComment->count()}} Comments</h2>

                        @foreach ($item->getComment as $comment)
                        <div class="media mb-4">
                            <img src="{{asset('front_assets/img/user.jpg')}}" alt="Image" class="img-fluid rounded-circle mr-3 mt-1" style="width: 45px;">
                            <div class="media-body">
                                <h6>{{$comment->name}} <small><i>{{date('M d,Y',$comment->create_at)}}</i></small></h6>
                                <p>{{$comment->comment}}</p>
                             
                            </div>
                        </div>  
                        @endforeach
             
                    </div>
    
                    <!-- Comment Form -->
                    <div class="bg-light p-5">
                        <h2 class="mb-4">Leave a comment</h2>
                        <form action="{{route('front.postcomment')}}" method="post">
                            @csrf

                            <input type="hidden" name="post_id" value="{{$item->id}}" >
                            <div class="form-group">
                               
                                <textarea id="message" name="comment" cols="30" rows="5" class="form-control" placeholder="message.."></textarea>
                            </div>
                            <div class="row mb-2">
                                <div class="col">
                                    <input type="text" name="name" class="form-control" id="name" placeholder="name..">
                                </div>
                                <div class="col">
                                    <input type="email" name="email" class="form-control" id="email" placeholder="email...">  
                                </div>
                            </div>
                          
                            <div class="form-group mb-0">
                                <input type="submit" value="Leave Comment" class="btn btn-primary px-3">
                            </div>
                        </form>
                    </div>

            </div> 
            @else
                <div class="alert">No Posts for this category...!</div>
            @endif
           


            {{-- =====================col right ================================ --}}
            <div class="col-lg-4 mt-5 mt-lg-0">

                <!-- Search Form -->
                <div class="mb-5">
                    <form action="">
                        <div class="input-group">
                            <input type="text" class="form-control form-control-lg" placeholder="Keyword">
                            <div class="input-group-append">
                                <span class="input-group-text bg-transparent text-primary"><i
                                        class="fa fa-search"></i></span>
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
                        @if (!@empty($tags))
                            
                        @foreach ($tags as $tag)
                        <a href="" class="btn btn-outline-primary m-1 a-tag">{{$tag->name}}</a>  
                        @endforeach
                            
                        @endif
                      
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- Detail End -->
@endsection
