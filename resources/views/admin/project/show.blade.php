@extends('layouts.admin')

@section('content')

    <div class="w-25 container h-100" style="width: 18rem;">
        <img src="{{ $data->img === null ? '/img/no-img.jpg' : asset('storage/' . $data->img)}}" class="card-img-top" alt="{{$data->title}}">
        <div class="card-body">
            <h5 class="card-title">{{ $data->title }}</h5>
            <p class="card-text">{{ $data->description }}</p>
            <p>{{ $data->type->title }}</p>
        </div>
    </div>
@endsection
