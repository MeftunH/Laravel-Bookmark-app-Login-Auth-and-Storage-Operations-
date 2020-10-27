@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <a href="/user">See all Users and them bookmarks</a>
                <div class="card">

                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @include('inc.messages')
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}

                            </div>
                        @endif
                        <button
                            style="background-color: #1d643b;
                            text-align:center"
                            class="btn btn-primary btn-lg"
                            data-toggle="modal"
                            data-target="#addModal"
                            type="button"
                            name="button">Add Bookmark
                        </button>

                        <h3>My Bookmarks</h3>    @foreach($bookmarks as $bookmarks)
                            <div class="row">
                                <div class="col">

                                                <a href="{{$bookmarks->url}}" target="_blank"
                                                   style="position: absolute">{{$bookmarks->name}} </a></div>
                                <div class="col"> <span class="label label-default"
                                                           style="position: absolute;margin-left:30%">{{$bookmarks->description}}</span></div>
                                <div class="col">
                                    <span class="label label-default"
                                                        style="position: absolute;margin-left:60%"><img height='70%'width="70%" src="{{Storage::url($bookmarks->image)}}" /></span></div>
                                <div class="col">
                                    <span class="pull-right button-group">

                              <button data-id="{{$bookmarks->id}}" type="button" class="delete-bookmark btn btn-danger"
                                      name="button" style="float:right;">Delete</button>

                                </span>
                                    <span class="pull-right button-group">

                              <a href="{{url('edit-bookmark/'.$bookmarks->id)}}" data-id="{{$bookmarks->id}}" type="button" class="btn btn-warning"
                                 name="button1" style="float:right;margin-right: 10px">Edit</a>

                                </span>
                                </div>
                            </div>
                                                     <br/>
                            @endforeach

                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="modal fade" tabindex="-1" role="dialog" id="addModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">
                    <form action="{{ route('bookmarks.store') }}" method="post" enctype="multipart/form-data">
                        @csrf


                        <div class="form-group">

                            Bookmark Name


                            <input type="text" class="form-control" name="name">

                        </div>
                        <div class="form-group">

                            Bookmark Url

                            <input type="text" class="form-control" name="url">


                        </div>

                        <div class="form-group">
                            <label>
                                Description
                            </label>
                            <textarea class="form-control" name="description"></textarea>
                        </div>
                        <div class="form-group mt-3">
                            <label for="exampleFormControlFile1">Select Image</label>
                            <input type="file" name='image' class="form-control-file" id="exampleFormControlFile1">
                        </div>
                        <input type="submit" name="submit" value="Submit" class="btn btn-dark">

                    </form>

                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
@endsection
