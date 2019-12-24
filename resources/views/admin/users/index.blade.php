@extends('layouts.app')

@section('content')

    <div class="card">
        <div class="card-header">Users</div>
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>SN#</th>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Permission</th>
                    <th>Option</th>
                </tr>
                </thead>
                <tbody>
                @if($users->count() > 0)
                    @php $i = 1; @endphp
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $i }}</td>
                            <td>{{ $user->name }}</td>
                            <td><img src="{{ asset($user->profile->avatar) }}" class="img-thumbnail" height="80" width="100"> </td>
                            <td>@if($user->admin)
                                    <a href="{{ route('user.normaluser', ['id' => $user->id]) }}" class="btn btn-danger btn-sm">Remove Permission</a>
                                @else
                                    <a href="{{ route('user.makeadmin', ['id' => $user->id]) }}" class="btn btn-success btn-sm"> Make Admin</a>
                                @endif
                            </td>
                            <td> <a href="{{ route('post.trash', ['id' => $user->id]) }}" class="btn btn-sm btn-danger">Delete</a>
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
