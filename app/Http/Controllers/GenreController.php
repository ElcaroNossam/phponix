<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function index()
    {
        $genres = Genre::all();
        return view('genres.index', compact('genres'));
    }
   
    public function show(Genre $genre)
    {
        $genres = Genre::all();
        return view('genres.show', compact('genre', 'genres'));
    }

    // app/Http/Controllers/GenreController.php


public function create()
{
    return view('genres.create');
}

public function store(Request $request)
{
    // Валидация данных
    $request->validate([
        'name' => 'required|string|max:255|unique:genres',
    ]);

    // Создание жанра
    Genre::create([
        'name' => $request->input('name'),
    ]);

    return redirect('/genres')->with('success', 'Жанр успешно создан.');
}

}
