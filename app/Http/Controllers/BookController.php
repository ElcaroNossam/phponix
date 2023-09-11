<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Genre;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $genres = Genre::all();
        $books = Book::all();
        return view('books.index', compact('books', 'genres'));
    }

    public function show(Book $book)
    {
        return view('books.show', compact('book'));
    }

    public function create()
    {
        return view('books.create');
    }

    public function store(Request $request)
    {
        // Валидация данных
        $request->validate([
            'title' => 'required|string|max:255|unique:books',
            'author' => 'required|string|max:255',
        ]);

        // Создание книги
        Book::create([
            'title' => $request->input('title'),
            'author' => $request->input('author'),
        ]);

        return redirect('/books')->with('success', 'Книга успешно создана.');
    }

}
