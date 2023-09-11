@extends('layouts.app')

@section('content')
    <h1>{{ $author->name }}</h1>

    <p><strong>Автор:</strong>  {{ $author->id }} {{ $author->name }}</p>
    <h2>Жанры автора:</h2>
    <ul>
        @foreach ($authorGenres as $genre)
            <li>{{ $genre->name }}</li>
        @endforeach
    </ul>
    <h2>Книги автора:</h2>
    <ul>
    @foreach ($authorBooks as $book)
            <li>{{ $book->title }}</li>
        @endforeach
    </ul>

    <a href="{{ route('authors.index') }}">Назад к списку авторов</a>
@endsection