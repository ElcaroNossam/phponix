@extends('layouts.app')

@section('content')
    <h1>Создать жанр</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="/genres">
        @csrf
        <div class="form-group">
            <label for="name">Название жанра</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <button type="submit" class="btn btn-primary">Создать</button>
    </form>
@endsection