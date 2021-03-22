@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-sm-4">
            <img src="https://image.tmdb.org/t/p/w300{{ $movie->image }}" alt=""/>
        </div>
        <div class="col-sm-8">
            {{-- TODO: Datos de la película --}}
            <h3>{{$movie->title}}</h3>
            <p><b>Year:</b> {{$movie->year}}</p>
            <p><b>Rate:</b> {{ $movie->vote_average }}</p>
            <p><b>Overview:</b> {{ $movie->overview }}</p>
            <a href="/like/{{$movie->id}}" class="btn btn-success"><i class="far fa-heart"></i> Like</a>
            <a href="/" class="btn btn-primary"><i class="fas fa-chevron-circle-left"></i> Back to Movies</a>
            @if(session("message"))
                <div class="alert alert-success">
                    {{session('message')}}
                </div>
            @endif
        </div>
    </div>
@endsection
