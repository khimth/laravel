    @extends('layouts.app')

    @section('content')
        @include('admin.includes.errors')
        <div class="card">
            <div class="card-header">
                Create a New Post
            </div>
            <div class="card-body">
                <form action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" name="title" id="title">
                    </div>
                    <div class="form-group">
                        <label for="featured">Featured Image</label>
                        <input type="file" class="form-control" name="featured" id="featured">
                    </div>
                    <div class="form-group">
                        <label for="category">Category</label>
                        <select name = "category" id="category" class="form-control">
                            <option value="">Select Category</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>

                    </div>
                    <div class="form-group">
                        <label for="content">Content</label>
                        <textarea id="content" name="content" cols="5" rows="5" class="form-control"></textarea>
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
