@extends('layouts.dashboard')

@section('content')
<div class="container">


    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    <h1>Update rooms</h1>
    <form class="col-md-6" action="{{ route('rooms.update', ['room' => $record->id]) }}" method="POST">
        @csrf
        @method('PATCH')
        <div class="form-group">
    <label for="name_en">name_en</label>
    <input type="text" class="form-control" id="name_en" name="name_en" value="{{ $record->name_en }}">
</div>
<div class="form-group">
    <label for="name_ar">name_ar</label>
    <input type="text" class="form-control" id="name_ar" name="name_ar" value="{{ $record->name_ar }}">
</div>
<div class="form-group">
    <label for="number_city">number_city</label>
    <input type="text" class="form-control" id="number_city" name="number_city" value="{{ $record->number_city }}">
</div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
    @endsection
