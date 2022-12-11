@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
       
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <p>{{ __('Post List') }}</p>
                    <p><a href="/posts/create" class="">Create a new one</a></p>
                </div>
                <div class="card-body">
                    @include('partials.successdismiss')
                    <table class="table">
                        <tr>
                            <th>Id</th>
                            <th>Title</th>
                            <th>Created_at</th>
                            <th>User</th>
                            <th>Action</th>
                        </tr>
                        @foreach ($postall as $post)
                            <tr>
                                <td>{{$post->id}}</td>
                                <td>{{$post->title}}</td>
                                <td>{{$post->created_at->diffForHumans()}}</td>
                                <td>{{$post->user_id}}</td>
                                <td>
                                    <a href="/posts/{{$post->id}}/edit" class="btn btn-warning">Edit</a>    
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#myModal">Delete</button>
                                     
                                      <!-- The Modal -->
                                      <div class="modal" id="myModal">
                                        <div class="modal-dialog">
                                          <div class="modal-content">
                                      
                                            <!-- Modal Header -->
                                            <div class="modal-header">
                                              <h4 class="modal-title">Make Sure</h4>
                                              <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>
                                      
                                            <!-- Modal body -->
                                            <div class="modal-body">
                                              Do you realy want to delete this catagory? If you click the "Yes Delete" button, this will be purmanently delete from database.
                                            </div>
                                      
                                            <!-- Modal footer -->
                                            <div class="modal-footer d-flex justify-content-between">
                                                <form action="/posts/{{$post->id}}" method="POST" class="d-inline-block">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="btn btn-danger ">Yes, Delete</button>    
                                                </form>
                                                <button type="button" class="btn btn-success" data-bs-dismiss="modal">No, Close</button>
                                            </div>
                                      
                                          </div>
                                        </div>
                                      </div>
                                                                        
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
