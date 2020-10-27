@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="card">

                    <div class="card-header">{{ __('Edit Page') }}</div>

                    <div class="card-body">
                        @include('inc.messages')
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}

                            </div>
                        @endif
                        <h3>Edit Page</h3>
                        <ul class="list-group">
                            @foreach($bookmarks as $bookmarks)



                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>

    </div>

                    <form action="{{url('/edit-bookmark/'.$bookmarks->id) }}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        {{method_field('PUT')}}

                        <div class="row">
                            <div class="col-sm-5 col-md-6">  Bookmark Name


                                <input type="text" class="form-control" name="name" value="{{old('name') ?? $bookmarks->name}}">
                            </div>
                            <div class="col-sm-5 offset-sm-2 col-md-6 offset-md-0">
                                Bookmark Url

                                <input type="text" class="form-control" name="url" value="{{old('url') ?? $bookmarks->url}}">

                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6 col-md-5 col-lg-6">  <label>
                                    Description
                                </label>
                                <input type="text" class="form-control" name="description" value="{{old('description') ?? $bookmarks->description}}" ></input>
                            </div>
                            <div class="col-sm-6 col-md-5 offset-md-2 col-lg-6 offset-lg-0 mt-3">
                                <label>
                                    Current Image:
                                </label>
                                <img height="100px" width="100px" src="{{Storage::url($bookmarks->image)}}" /></div>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlFile1">Select Image</label>
                            <input type="file" name='image' class="form-control-file" id="exampleFormControlFile1">
                        </div>
                        <input type="submit" name="submit" value="Submit" class="btn btn-dark">

                    </form>

@endsection
