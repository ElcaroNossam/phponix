@extends('layouts.app')

@section('content')
    <p>ID: {{ $genre->id }}</p>
    <h1>{{ $genre->name }}</h1>
@endsection