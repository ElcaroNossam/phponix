<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// app/Http/Controllers/AuthorController.php

use App\Models\Author;
use App\Models\Genre;

class AuthorController extends Controller
{
   
    public function show(Author $author)
    {
        $genres = Genre::all();
        $authorGenres = $author->genres;
        $authorBooks = $author->books;
        return view('authors.show', compact('author', 'authorGenres', 'authorBooks', 'genres'));
    }

    public function index()
    {
        $genres = Genre::all();
        $authors = Author::all();
        return view('authors.index', compact('authors', 'genres'));
    }

    public function create()
    {
        return view('authors.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Author::create([
            'name' => $request->input('name'),
        ]);

        return redirect('/authors')->with('success', 'Автор успешно создан.');
    }

    public function edit(Author $author)
    {
        return view('authors.edit', compact('author'));
    }

    public function update(Request $request, Author $author)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $author->update([
            'name' => $request->input('name'),      
        ]);

        return redirect('/authors')->with('success', 'Автор успешно обновлен.');
    }

    public function destroy(Author $author)
    {
        $author->delete();
        return redirect('/authors')->with('success', 'Автор успешно удален.');
    }
}

