<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Author;
use App\Models\Genre;
use App\Models\Book;

class AuthorManager extends Component
{
   

    public $authors;
    public $genres;
    public $books;
    public $name;
    public $authorBooks;
    public $selectedGenres = [];
    public $selectedBooks = [];
    public $selectedAuthor = [];
    public $selectedAuthorGenres = [];
    public $selectedAuthorBooks = [];

    public function mount()
    {
        $this->authors = Author::all();
        $this->genres = Genre::all();
        $this->books = Book::all();
    }

    public function createAuthor()
    {
        $this->validate([
            'name' => 'required|string|max:255',
        ]);

        $author = Author::create([
            'name' => $this->name,
        ]);

        $author->genres()->sync($this->selectedGenres);
        $author->books()->sync($this->selectedBooks);

        $this->name = '';

        $this->selectedGenres = [];
        $this->selectedBooks = [];
        
        
        $this->authors = Author::all();
    }

    public function editAuthor($authorId)
    {
        $this->selectedAuthor = Author::find($authorId);
        $this->name = $this->selectedAuthor->name;
        $this->selectedAuthorGenres = $this->selectedAuthor->genres->pluck('id')->toArray();
        $this->selectedAuthorBooks = $this->selectedAuthor->books->pluck('id')->toArray();

        
    }
    public function deleteAuthor($authorId)
    {
        $author = Author::find($authorId);
        $author->genres()->detach();
        $author->books()->detach(); // Удаляем связи с жанрами перед удалением автора
        $author->delete();
        $this->authors = Author::all();
    }

    public function updateAuthor()
{
    $this->validate([
        'name' => 'required|string|max:255',
    ]);

    if ($this->selectedAuthor) {
        $this->selectedAuthor->update([
            'name' => $this->name,
        ]);

        $this->selectedAuthor->genres()->sync($this->selectedGenres);
        $this->selectedAuthor->books()->sync($this->selectedBooks);

        // Сброс данных после обновления
        $this->selectedAuthor = null;
        $this->name = '';
        $this->selectedGenres = [];
        $this->selectedBooks = [];
        
        $this->authors = Author::all(); // Обновляем список авторов
    }
}


    public function render()
    {
        return view('livewire.author-manager', [
            'genres' => $this->genres->toArray(),
            'selectedAuthorGenres' => $this->selectedAuthorGenres, 
            'selectedAuthorBooks' => $this->selectedAuthorBooks,
    
        ]);
    }
}
