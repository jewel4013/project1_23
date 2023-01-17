@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
       
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <p>{{ __('Users List') }}</p>
                    {{-- <p><a href="/posts/create" class="">Create a new one</a></p> --}}
                </div>
                <div class="card-body">
                    @include('partials.message')
                    <table class="table">
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Created At</th>
                            <th>Type</th>
                            <th>Actions</th>
                        </tr>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{$user->id}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->created_at->diffForHumans()}}</td>
                                <td>
                                    @if($user->user_type == 'admin')
                                        {{"Admin"}}
                                    @elseif($user->user_type == 'modarator')
                                        {{"Modarator"}}
                                    @elseif($user->user_type == 'user')
                                        {{"User"}}
                                    @endif                                    
                                </td>
                                <td>
                                     
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
