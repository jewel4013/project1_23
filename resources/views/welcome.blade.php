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


        <div class="col-md-5">
            @foreach ($posts as $post)    
                <div class="card mb-3">
                    <div class="card-header d-flex align-items-center">
                        <div class="">
                            <img src="{{$post->thumbnail_path()}}" alt="Thumbnail Photo" width="40" height="40" style="" class="rounded-circle">
                        </div>
                        <div class="d-flex flex-column" style="margin-left: 10px">
                            <a class="m-0 text-decoration-none" href="#" style="font-size:22px">{{$post->title}}</a>
                            <span class="m-0" style="font-size: 11px">{{$post->created_at->diffForHumans()}}</span>
                        </div>
                    </div>
                    <div class="card-body">
                        <p>{{$post->body}}</p>
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
