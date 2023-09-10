<div>
    <h1>Управление книгами</h1>

    <form wire:submit.prevent="createBook">
        <input type="text" wire:model="title" placeholder="Название книги">
     
        <input type="number" wire:model="publication_year" placeholder="Год публикации">
        <input type="text" wire:model="publisher" placeholder="Издательство">
        <input type="text" wire:model="isbn" placeholder="ISBN">
        <button type="submit">Создать</button>
    </form>

    @if ($selectedBook)
        <form wire:submit.prevent="updateBook">
            <input type="text" wire:model="title">
            
            <input type="number" wire:model="publication_year">
            <input type="text" wire:model="publisher">
            <input type="text" wire:model="isbn">
            <button type="submit">Обновить</button>
        </form>
    @endif

    <ul>
        @foreach ($books as $book)
            <li>
                {{ $book->title }} ({{ $book->publisher }})
                <button wire:click="editBook({{ $book->id }})">Редактировать</button>
                <button wire:click="deleteBook({{ $book->id }})">Удалить</button>
            </li>
        @endforeach
    </ul>
</div>
