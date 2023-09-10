<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// app/Http/Controllers/AuthorController.php

use App\Models\Author;

class AuthorController extends Controller
{
    public function show(Author $author)
    {
        $authorGenres = $author->genres;
        return view('authors.show', compact('author', 'authorGenres'));
    }

    public function index()
    {
        $authors = Author::all();
        return view('authors.index', compact('authors'));
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

