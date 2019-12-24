    @extends('layouts.app')

    @section('content')
        @include('admin.includes.errors')
        <div class="card">
            <div class="card-header">
                Create a New Tag
            </div>
            <div class="card-body">
                <form action="{{ route('tag.store') }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="title">Tag Name</label>
                        <input type="text" class="form-control" name="tag" id="tag" required>
                    </div>
                    <div class="form-group">
                        <div class="text-center">
                            <button type="submit" class="btn btn-success">Create Post</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    @endsection
