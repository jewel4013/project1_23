@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Make A post') }}</div>



                <div class="card-body">
                    <form method="POST" action="/posts">
                        @csrf


                        <div class="row mb-3">
                            <label for="title" class="col-md-4 col-form-label text-md-end">{{ __('Post Title') }}</label>
                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" autofocus>

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
                                        <option value="{{$catagory->id}}">{{$catagory->name}}</option>
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
                            <label for="body" class="col-md-4 col-form-label text-md-end">{{ __('Post Body') }}</label>
                            <div class="col-md-6">
                                <textarea id="body" class="form-control @error('body') is-invalid @enderror" name="body" cols="5" role="3">{{ old('body') }}</textarea>
                                @error('body')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>




                        <div class="row mb-3">
                            <div class="col-md-4"></div>
                            <button type="submit" class="btn btn-info col-md-6">Submit</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection