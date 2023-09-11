<?php 
namespace App\Livewire;

use Livewire\Component;
use App\Models\Genre;



class GenreManager extends Component
{
    public $layout = 'layouts.app';
    public $genres;
    public $name;
    public $selectedGenre;

    public function mount()
    {
        $this->genres = Genre::all();
    }

    public function createGenre()
    {
        Genre::create(['name' => $this->name]);
        $this->name = '';
        $this->genres = Genre::all();
    }

    public function editGenre($genreId)
    {
        $this->selectedGenre = Genre::find($genreId);
        $this->name = $this->selectedGenre->name;
    }

    public function updateGenre()
    {
        $this->selectedGenre->update(['name' => $this->name]);
        $this->name = '';
        $this->selectedGenre = null;
        $this->genres = Genre::all();
    }

    public function deleteGenre($genreId)
    {
        $genre = Genre::find($genreId);
        $genre->delete();
        $this->genres = Genre::all();
    }

 
    public function render()
    {
        return view('livewire.genre-manager');
    }
}
