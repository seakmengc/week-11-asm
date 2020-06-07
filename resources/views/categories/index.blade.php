@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Categories</div>

                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                        @forelse ($categories as $ind => $category)
                            <tr id="category-{{ $category->id }}">
                                <td>{{ $ind + 1 }}</td>
                                <td>{{ $category->name }}</td>
                                <td>
                                    <form style="display: inline-block" action="{{ route('categories.show', $category) }}" method="GET">
                                        <button type="submit" class="btn btn-outline-info">Show</button>
                                    </form>
                                    <form style="display: inline-block" action="{{ route('categories.edit', $category) }}" method="GET">
                                        <button type="submit" class="btn btn-outline-primary">Edit</button>
                                    </form>
                                    <form style="display: inline-block" action="{{ route('categories.destroy', $category) }}" method="post">
                                        @method('DELETE')
                                        @csrf

                                        <button type="submit" class="btn btn-outline-danger">Delete</button>
                                    </form>

                                    <button type="submit" class="btn btn-outline-danger ajax-delete" data-url="{{ route('categories.ajax_delete', $category) }}" data-id="category-{{ $category->id }}">Ajax Delete</button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td style="text-align: center" colspan="3">No category found. <a href="{{ route('categories.create') }}">Want to add one?</a></td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>

                    <div class="pagination justify-content-center">
                        {{ $categories->links() }}
                    </div>

                    <div class="pl-3 pb-3">
                        <a class="btn btn-primary" href="{{ route('categories.create') }}">Add</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
