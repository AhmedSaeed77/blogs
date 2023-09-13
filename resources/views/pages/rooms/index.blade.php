@extends('layouts.dashboard')

@section('content')
<div class="container">
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
        <div class="d-flex justify-content-between align-items-center">

    <h1>rooms List</h1>
                            <a href="{{ route('rooms.create') }}" class="btn btn-primary btn-sm">Create</a>

    </div>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>name_en</th>
        <th>name_ar</th>
        <th>number_city</th>
         <!-- Generate table headers -->
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($records as $record)
                <tr>
                    <td>{{ $record->id }}</td>
                    <td>{{ $record->name_en }}</td>
                    <td>{{ $record->name_ar }}</td>
                    <td>{{ $record->number_city }}</td>
                     <!-- Generate table columns -->
                    <td>
                        <form class="d-inline" action="{{ route('rooms.destroy', $record->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                        <a href="{{ route('rooms.edit', $record->id) }}" class="btn btn-primary btn-sm">Edit</a>
                        <a href="{{ route('rooms.show', $record->id) }}" class="btn btn-primary btn-sm">View</a>

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $records->links('pagination::bootstrap-4') }}
</div>
    @endsection
