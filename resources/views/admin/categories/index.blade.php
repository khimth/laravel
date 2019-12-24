    @extends('layouts.app')

    @section('content')
        <div class = "card">
            <div class="card-header">Categories</div>
            <div class="card-body">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>SN</th>
                        <th>Category Name</th>
                        <th>Option</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if($categories->count() > 0)
                    @php $i = 1; @endphp
                    @foreach($categories as $category)
                        <tr>
                            <td> {{ $i }}</td>
                            <td> {{ $category->name }}</td>
                            <td> <a href="{{ route('categories.edit', ['id' => $category->id]) }}" class="btn btn-sm btn-success">Edit </a>
                                <a href="{{ route('categories.delete', ['id' => $category->id]) }}" class="btn btn-sm btn-danger">Delete</a></td>
                        </tr>
                        @php $i++; @endphp
                    @endforeach
                    @else
                        <tr><td colspan="3" class="text-center font-weight-bold"> No record(s) found</td> </tr>
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    @endsection
