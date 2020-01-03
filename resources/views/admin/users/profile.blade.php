@extends('layouts.app')

@section('content')
    @include('admin.includes.errors')
    <div class="card">
        <div class="card-header">
            Create a New User
        </div>
        <div class="card-body">
            <form action="{{ route('users.profile.update') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" id="name" value="{{ $user->name }}">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" id="email" autocomplete="off" value="{{ $user->email }}">
                </div>
                <div class="form-group">
                    <label for="password">New Password</label>
                    <input type="password" class="form-control" name="password" id="password" autocomplete="off">
                </div>
                <div class="form-group">
                    <label for="facebook">Facebook Profile</label>
                    <input type="text" class="form-control" name="facebook" id="facebook" value="{{ $user->profile->facebook }}">
                </div>
                <div class="form-group">
                    <label for="youtube">Youtube Profile Test</label>
                    <input type="text" class="form-control" name="youtube" id="youtube" value="{{ $user->profile->youtube }}">
                </div>
                <div class="form-group">
                    <label for="avatar">Avatar</label>
                    <input type="file" class="form-control" name="avatar" id="avatar">
                </div>
                <div class="form-group">
                    <label for="about">About</label>
                    <textarea id="about" name="about" cols="5" rows="5" class="form-control">{{ $user->profile->about }}</textarea>
                </div>
                <div class="form-group">
                    <div class="text-center">
                        <button type="submit" class="btn btn-success">Update Profile RTest</button>
                    </div>
                </div>
            </form>

        </div>
    </div>
@stop
@section('styles')
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.css" rel="stylesheet">
@stop
@section('scripts')
    <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#about').summernote();
        });
    </script>
@stop
