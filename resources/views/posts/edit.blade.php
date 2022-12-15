@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Posts Update') }}</div>

                <div class="card-body">
                    <form action="/posts/{{$post->id}}" method="POST">
                        @csrf
                        @method('put')


                        <div class="row mb-3">
                            <label for="title" class="col-md-4 col-form-label text-md-end">{{ __('Post Title') }}</label>
                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') ? old('title') : $post->title }}">

                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label for="catagory" class="col-md-4 col-form-label text-md-end">{{ __('Catagories') }}</label>
                            <div class="col-md-6">
                                <select id="catagory" class="form-control @error('catagory_id') is-invalid @enderror" name="catagory_id">
                                    <option>Select catagory</option>
                                    @foreach ($catagories as $catagory)
                                        <option value="{{$catagory->id}}" {{$post->catagory_id == $catagory->id ? 'selected' : ''}}>{{$catagory->name}}</option>
                                    @endforeach                                
                                </select>

                                @error('catagory_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label for="tag_id" class="col-md-4 col-form-label text-md-end">{{ __('Tags') }}</label>
                            <div class="col-md-6">
                                <select id="tag_id" class="form-control @error('tag_id') is-invalid @enderror" name="tag_id[]" multiple>
                                    <option>Select Tag</option>
                                    @foreach ($tags as $tag)
                                        <option value="{{$tag->id}}">{{$tag->name}}</option>
                                    @endforeach                                
                                </select>

                                @error('tag_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label for="body" class="col-md-4 col-form-label text-md-end">{{ __('Post Body') }}</label>
                            <div class="col-md-6">
                                <textarea id="body" class="form-control @error('body') is-invalid @enderror" name="body" cols="5" role="3">{{ old('body') ? old('body') : $post->body}}</textarea>
                                @error('body')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>




                        <div class="row mb-3">
                            <div class="col-md-4"></div>
                            <button type="submit" class="btn btn-info col-md-6">Update</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
