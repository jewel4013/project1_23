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
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h4 class="m-0">{{ __('Post') }}</h4>
                </div>
                @foreach ($posts as $post)    
                    <div class="card m-2">
                        <h5>{{$post->title}}</h5>
                        <p>{{$post->body}}</p>
                    </div>
                @endforeach
            </div>
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
