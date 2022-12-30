@extends('layouts.app')

@section('content')
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

            <div class="card mb-3">
                <div class="card-header d-flex align-items-center">
                    
                </div>
                <div class="card-body">
                    
                </div>
            </div>
           
        </div>

        <div class="col-md-3">
            <div class="" style="">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h4 class="m-0">{{ __('Profile Picture') }}</h4>
                    </div>
                    <div class="card-body" style="height: 400px">
                        <img src="{{$user->profile_pic()}}" alt="User Profile" class="img-fluid rounded-circle" style=""><br>
                        <a href="/profile/edit" class="btn btn-info btn-sm">Update Profile</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
