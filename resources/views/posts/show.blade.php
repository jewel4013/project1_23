@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">  
        
        


        

        <div class="col-md-6">       
            <div class="card mb-3">
                <div class="card-header d-flex align-items-start">
                    <div class="">
                        <img src="{{$post->thumbnail_path()}}" alt="Thumbnail Photo" width="200" height="200" style="" class="">
                    </div>
                    <div class="d-flex flex-column" style="margin-left: 10px">
                        <a href="/posts/{{$post->id}}" class="m-0 text-decoration-none" style="font-size:22px">{{$post->title}}</a>
                        <span class="m-0" style="font-size: 12px">{{$post->created_at->diffForHumans()}}</span>
                    </div>
                </div>
                <div class="card-body">
                    <p class="m-0 p-0">{{$post->body}}</p>
                    {{-- <div class="">
                        <img src="{{$post->thumbnail_path()}}" alt="Thumbnail Photo" width="400" height="400">
                    </div> --}}
                </div>
                {{-- <div class="card-footer d-flex">
                    <div class="">
                        <button class="btn p-0 mx-1">
                            <i class="fa-solid fa-thumbs-up" style="font-size: 20px"></i>
                            <span>5</span>
                        </button>
                    </div>
                    <div class="mx-4">
                        <button class="btn p-0 mx-1" >
                            <i class="fa-solid fa-thumbs-down" style="font-size: 20px"></i>
                            <span>1</span>
                        </button>
                    </div>
                </div> --}}
                
                <div style="" class="card-footer d-flex justify-content-around" >
                    <div class="">
                        <form action="/posts/{{$post->id}}/liked" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-sm px-5 {{$post->likeByCurrentUser() ? "btn-danger" : "btn-info"}}" style="">
                                <span class="{{$post->likes()->count() == 0 ? 'd-none' : ''}}" style="margin-right: 15px">{{$post->likes->count()}}</span>
                                <i class="fa-regular fa-thumbs-up" style="font-size:17px"></i>
                                <span class="m-1">{{$post->likeByCurrentUser() ? "Dislike" : "Like"}}</span>
                            </button>
                        </form>
                    </div>
                    <div class="">                        
                        <a type="submit" class="text-black text-decoration-none px-5" style="">
                            <span class="{{$post->comments->count() == 0 ? 'd-none' : ''}}" style="margin-right: 5px">{{$post->comments->count()}}</span>                            
                            <span class="m-1">Comment</span>
                        </a>
                    </div>
                </div>









                <div class="container">
                    @include('partials.message')
                    
                    <h3 class="m-0">Comment</h3>
                    <form action="/posts/{{$post->id}}/comments" method="POST">
                        @csrf
                        <textarea id="comment_body" 
                            class="form-control @error('comment_body') is-invalid @enderror" 
                            name="comment_body"
                            placeholder="Say someting">{{ old('comment_body') }}</textarea>
                       
                        @error('comment_body')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <button type="submit" class="btn btn-success my-2">Comment</button>
                    </form>
                </div>
            </div>


            @foreach ($post->comments as $comment)
                <div class="card mb-2">
                    <div class="p-3">
                        <p class="m-0 p-0 d-flex justify-content-between" style="font-size: 18px">{{$comment->woner->name}}
                            <a href="/comments/{{$comment->id}}/liked" class="btn btn-sm {{($comment->likeByCurrentUser()) ? 'btn-danger' : 'btn-info'}}">
                                <span class="m-2 {{$comment->likes()->count() == 0 ? 'd-none' : ''}}">{{$comment->likes()->count()}}</span>
                                <i class="fa-regular fa-thumbs-up" style="font-size:17px"></i>
                            </a>
                        </p>
                        <p class="m-0 p-0" style="font-size: 10px" title="{{$comment->created_at}}">{{$comment->created_at->diffForHumans()}}</p>
                    </div>
                    <div class="card-body">
                        {{$comment->comment_body}} 
                    </div>
                </div>
            @endforeach
        </div>






        <div class="col-md-3">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h4 class="m-0">{{ __('This post\'s Catagories') }}</h4>
                </div>
                <div class="card-body">
                    @foreach ($catagories as $catagory)
                        <span class="list-group-item">
                            <a href="/posts/catagory/{{$catagory->id}}" class="text-decoration-none">
                                {{($catagory->id == $post->catagory_id) ? $catagory->name : ''}}
                            </a>
                        </span>
                    @endforeach
                    
                    {{-- <span class="list-group-item">{{$post->catagory_id}}</span> --}}
                </div>
            </div>

            {{-- Tags --}}
            <div class="card mt-3">
                <div class="card-header d-flex justify-content-between">
                    <h4 class="m-0">{{ __('This post\'s Tags') }}</h4>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        @foreach ($post->tags as $tag)
                            <li class="list-group-item">{{$tag->name}}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>





    </div>
</div>
@endsection
