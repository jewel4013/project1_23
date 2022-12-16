@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
       

        <div class="col-md-2">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h4 class="m-0">{{ __('Tags') }}</h4>
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


        <div class="col-md-6">
            @foreach ($posts as $post)    
                <div class="card mb-3">
                    <div class="card-header">
                        <img src="{{$post->thumbnail_path()}}" alt="Thumbnail Photo" width="40" height="40" style="" class="rounded-circle">
                        <a class="m-0">{{$post->title}}</a>
                        <p class="m-0">{{$post->created_at->diffForHumans()}}</p>
                    </div>
                    <div class="card m-2">
                        <p>{{$post->body}}</p>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="col-md-3">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h4 class="m-0">{{ __('Catagories') }}</h4>
                </div>
                <div class="card-body">
                    @foreach ($catagories as $catagory)
                        <span class="list-group-item">{{$catagory->name}}</span>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
