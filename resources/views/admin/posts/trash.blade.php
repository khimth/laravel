@extends('layouts.app')

@section('content')

    <div class="card">
        <div class="card-header">Trashs Posts</div>
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>SN#</th>
                    <th>Post Title</th>
                    <th>Image</th>
                    <th>Option</th>
                </tr>
                </thead>
                <tbody>
                @if($posts->count() > 0)
                @php $i = 1; @endphp
                @foreach($posts as $post)
                    <tr>
                        <td>{{ $i }}</td>
                        <td>{{ $post->title }}</td>
                        <td><img src="{{ $post->featured_image }}" class="img-thumbnail" height="80" width="100"> </td>
                        <td>{{ $post->name }}</td>
                        <td><a href="{{ route('post.restore', ['id' => $post->id]) }}" class="btn btn-sm btn-success">Restore</a>
                            <a href="{{ route('post.delete', ['id' => $post->id]) }}" class="btn btn-sm btn-danger">Delete</a>
                        </td>
                    </tr>
                    @php $i++; @endphp
                @endforeach
                @else
                    <tr><td colspan="5" class="text-center font-weight-bold"> No record(s) found</td> </tr>
                @endif
                </tbody>
            </table>
        </div>
    </div>

@endsection
