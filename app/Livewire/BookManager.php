<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Book;
class BookManager extends Component
{
    public $layout = 'layouts.app';public $title;
 
    public $publication_year;
    public $publisher;
    public $isbn;
    public $books;
    public $selectedBook;
    public function mount()
    {
        $this->books = Book::all();
    }

    public function createBook()
    {
        $this->validate([
            'title' => 'required|string|max:255',
            
            'publication_year' => 'required|integer',
            'publisher' => 'required|string|max:255',
            'isbn' => 'required|string|max:255|unique:books,isbn', // Проверка на уникальность ISBN
        ]); 
    
        // Создание книги
        Book::create([
            'title' => $this->title,

            'publication_year' => $this->publication_year,
            'publisher' => $this->publisher,
            'isbn' => $this->isbn,
        ]);
    
        // Очистка полей после создания
        $this->title = '';
        
        $this->publication_year = '';
        $this->publisher = '';
        $this->isbn = '';

        // Обновить список книг
        $this->books = Book::all();
    }

    public function editBook($bookId)
    {
        $this->selectedBook = Book::find($bookId);
        $this->title = $this->selectedBook->title;
        $this->author = $this->selectedBook->author;
    }

    public function updateBook()
    {
        // Ваша логика для обновления книги
        // Например:
        $this->selectedBook->update([
            'title' => $this->title,

            'publication_year' => $this->publication_year,
            'publisher' => $this->publisher,
            'isbn' => $this->isbn,
        ]);

        // Очистить поля после обновления
        $this->title = '';
        
        $this->publication_year = '';
        $this->publisher = '';
        $this->isbn = '';

        // Сброс выбранной книги
        $this->selectedBook = null;

        // Обновить список книг
        $this->books = Book::all();
    }

    public function deleteBook($bookId)
    {
        $book = Book::find($bookId);
        $book->delete();

        // Обновить список книг
        $this->books = Book::all();
    }

    public function render()
    {
        return view('livewire.book-manager');
    }
}
