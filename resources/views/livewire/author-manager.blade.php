

<div>
    <h1>Управление авторами</h1>

    <form wire:submit.prevent="createAuthor">
        <input type="text" wire:model="name" placeholder="Имя автора">
        <select multiple wire:model="selectedGenres">
        @foreach ($genres as $genre)
            <option value="{{ $genre->id }}">{{ $genre->name }}</option>
        @endforeach
    </select>
        <button type="submit">Создать автора</button>
    </form>


    <ul>
        @foreach ($authors as $author)
            <li>
                {{ $author->name }} ({{ $author->birthdate }})
                <button wire:click="editAuthor({{ $author->id }})">Редактировать</button>
                <button wire:click="deleteAuthor({{ $author->id }})">Удалить автора</button>
            </li>
        @endforeach
    </ul>
</div>
