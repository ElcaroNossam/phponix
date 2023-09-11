

<div>
    <h1>Управление авторами</h1>

    <form wire:submit.prevent="createAuthor">
        <input type="text" wire:model="name" placeholder="Имя автора">
        <label for="book_id">Выберите жанр:</label>
        <select multiple wire:model="selectedGenres">
        @foreach ($genres as $genre)
            <option value="{{ $genre->id }}">{{ $genre->name }}</option>
        @endforeach
    </select>

    <label for="book_id">Выберите книгу:</label>
    <select multiple wire:model="selectedBooks" id="book_id" class="form-control custom-select">
        @foreach ($books as $book)
            <option value="{{ $book->id }}">{{ $book->title }}</option>
        @endforeach
        </select>
        <button type="submit">Создать автора</button>

    </form>
    @if ($selectedAuthor)
        <form wire:submit.prevent="updateAuthor">
            <input type="text" wire:model="name">
            <!-- Выбор жанров -->
    <select multiple wire:model="selectedGenres">
        @foreach ($genres as $genre)
            <option value="{{ $genre->id }}">{{ $genre->name }}</option>
        @endforeach
    </select>

    <!-- Выбор книг -->
    <select multiple wire:model="selectedBooks">
        @foreach ($books as $book)
            <option value="{{ $book->id }}">{{ $book->title }}</option>
        @endforeach
    </select>

            <button type="submit">Обновить</button>
        </form>
    @endif

    <ul>
        @foreach ($authors as $author)
            <li>
                {{ $author->name }} 
                <button wire:click="editAuthor({{ $author->id }})">Редактировать</button>
                
                <button wire:click="deleteAuthor({{ $author->id }})">Удалить автора</button>
            </li>
        @endforeach
    </ul>
  
</div>
</div>
