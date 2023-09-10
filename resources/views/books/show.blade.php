@extends('layouts.app')

@section('content')
    <h1>{{ $book->title }}</h1>

    <p><strong>Автор:</strong> {{ $book->author }}</p>
    <!-- Другие детали книги, которые вы хотите отобразить -->
    <a href="{{ route('books.index') }}">Назад к списку книг</a>
@endsection