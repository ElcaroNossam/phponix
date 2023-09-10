<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Author;
use App\Models\Genre;

class AuthorManager extends Component
{
   

    public $authors;
    public $genres;
    public $name;
    public $selectedGenres = [];
    public $selectedAuthor = [];
    public $selectedAuthorGenres = [];

    public function mount()
    {
        $this->authors = Author::all();
        $this->genres = Genre::all();
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

        $this->name = '';
        $this->selectedGenres = [];
        
        
        $this->authors = Author::all();
    }

    public function editAuthor($authorId)
    {
        $this->selectedAuthor = Author::find($authorId);
        $this->selectedAuthorGenres = $this->selectedAuthor->genres->pluck('id')->toArray();
    }
    public function deleteAuthor($authorId)
    {
        $author = Author::find($authorId);
        $author->genres()->detach(); // Удаляем связи с жанрами перед удалением автора
        $author->delete();
        $this->authors = Author::all();
    }

    public function render()
    {
        return view('livewire.author-manager', [
            'genres' => $this->genres->toArray(),
            'selectedAuthorGenres' => $this->selectedAuthorGenres, 
    
        ]);
    }
}
