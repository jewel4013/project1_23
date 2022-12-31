@extends('layouts.app')



@section('content')
<link rel="stylesheet" href="{{asset('css/profileStyle.css')}}">
<div class="container-fluid">
    <div class="row justify-content-center">
       

        <div class="col-md-3">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h4 class="m-0">{{ __('User Information') }}</h4>
                </div>
                <div class="card-body">
                @guest
                                        
                @else
                    <h2>{{Auth::user()->name}}</h2>
                    <b>{{Auth::user()->user_type}}</b><br>
                    <b>{{Auth::user()->email}}</b>

                @endguest
                </div>
            </div>
        </div>


        <div class="col-md-5">
            <div class="card mb-2">
                <a href="/posts/create" class="btn">Create a new post</a>
            </div>

            @include('partials.message')
            @forelse ($user->posts as $post)
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
                        <p class="m-0 p-0">{{Str::limit($post->body, '100', '...')}}</p>
                    </div>
                </div>
            @empty
                <h1 class="d-flex justify-content-center mt-5 text-danger " style="font-weight:bolder">No record found</h1>
            @endforelse
           
        </div>

        <div class="col-md-3">
            <div class="card profile">
                <div class="card-header d-flex justify-content-between">
                    <h4 class="m-0">{{ __('Profile Picture') }}</h4>
                </div>
                <div class="card-body" style="height: 400px">
                    @if(!$user->profile_pic)
                        <img src="{{$user->profile_pic()}}" alt="User Profile" class="img-fluid rounded-circle" style="" ><br>    
                    @else
                        <img src="{{$user->profile_pic()}}" alt="User Profile" class="img-fluid rounded-circle" style="" ><br>
                    @endif
                    <a href="/profile/edit" class="btn btn-info btn-sm">Update Profile</a>
                </div>
            </div>            
        </div>
    </div>
</div>
@endsection
