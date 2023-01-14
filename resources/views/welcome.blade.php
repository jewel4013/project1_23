@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
       

        <div class="col-md-4">
            @guest

            @else    
                <div class="card mb-3">
                    <div class="card-header d-flex justify-content-between">
                        <h4 class="m-0">{{ __('User Information') }}</h4>
                    </div>
                    <div class="card-body">
                        <h2>{{Auth::user()->name}}</h2>
                        <p>User ID: <b>{{Auth::user()->email}}</b></p>
                        <p>User type: <b>{{Auth::user()->user_type}}</b></p>
                        <p>Last Login: <b>{{Auth::user()->last_login->diffForHumans()}}</b></p>
                    </div>
                    <div class="card-body">
                        <a href="/userinfo" class="btn btn-info btn-sm">Download User information</a>
                    </div>
                </div>
            @endguest
                
            <div class="card">
                <div class="card-header">
                    <h3>Templete</h3>
                </div>
                <div class="card-body">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe adipisci repellendus ratione nobis ipsa quidem unde iste deleniti, dolor dolore nulla delectus accusantium corporis doloremque tenetur expedita. Laborum, impedit doloribus.</p>
                </div>
            </div>
        </div>


        <div class="col-md-5">
            <div class="card mb-2">
                <a href="/posts/create" class="btn">Create a new post</a>
            </div>

            @forelse ($posts as $post)    
                <div class="card mb-3">
                    <div class="card-header d-flex align-items-center">
                        <div class="">
                            <img src="{{$post->thumbnail_path()}}" alt="Thumbnail Photo" width="40" height="40" style="" class="rounded-circle">
                        </div>
                        <div class="d-flex flex-column" style="margin-left: 10px">
                            <a href="/posts/{{$post->id}}" class="m-0 text-decoration-none" style="font-size:22px">{{$post->title}}</a>
                            <span class="m-0" style="font-size: 12px">{{$post->created_at->diffForHumans()}}</span>
                        </div>
                    </div>
                    <div class="card-body">
                        <p class="m-0 p-0">{!! Str::limit($post->body, '100', '...') !!}</p>
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
            @empty
                <h1 class="d-flex justify-content-center mt-5 text-danger " style="font-weight:bolder">No record found</h1>
            @endforelse
        </div>

        <div class="col-md-2 position-sticky">
            <div class="" style="">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h4 class="m-0">{{ __('Catagories') }}</h4>
                    </div>
                    <div class="card-body">
                        <span class="list-group-item  bg-secondary text-white">
                            <a href="{{url('/')}}" class="text-decoration-none text-white">All Posts</a>
                            <span class="m-3">{{$allposts->count()}}</span>
                        </span>
                        @foreach ($catagories as $catagory)
                            <span class="list-group-item ">
                                <a href="/posts/catagory/{{$catagory->id}}" class="text-decoration-none">{{$catagory->name}}</a>
                                <span class="m-3">{{$catagory->searchByStatus()->count()}}</span>
                            </span>
                        @endforeach
                    </div>
                </div>

                {{-- Tags --}}
                <div class="card mt-3">
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
        </div>
    </div>
</div>
@endsection
