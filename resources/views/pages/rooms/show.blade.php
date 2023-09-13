@extends('layouts.dashboard')

@section('content')
<div class="container">
    <h1>rooms Details</h1>

    <div class="card">
        <div class="card-body">
            <h4>name_en : {{$record->name_en}}</h4>
     <h4>name_ar : {{$record->name_ar}}</h4>
     <h4>number_city : {{$record->number_city}}</h4>
     
        </div>
    </div>
</div>
    @endsection
