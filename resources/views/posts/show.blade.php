@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">  
        
        




        <div class="col-md-8">       
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

                <div class="card-footer">
                    <a href="" class="btn btn-info btn-sm">Like</a>
                </div>
                <div class="container">
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


            <div class="card">
                <div class="card-body">
                    
                </div>
            </div>
        </div>






        <div class="col-md-3">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h4 class="m-0">{{ __('This post\'s Catagories') }}</h4>
                </div>
                <div class="card-body">
                    @foreach ($catagories as $catagory)
                        <span class="list-group-item">{{$catagory->name}}</span>
                    @endforeach
                </div>
            </div>

            {{-- Tags --}}
            <div class="card mt-3">
                <div class="card-header d-flex justify-content-between">
                    <h4 class="m-0">{{ __('This post\'s Tags') }}</h4>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        @foreach ($tags as $tag)
                            <li class="list-group-item">{{$tag->name}}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>





    </div>
</div>
@endsection
