
<div>
    <h1>Управление жанрами</h1>

    <form wire:submit.prevent="createGenre">
        <input type="text" wire:model="name" placeholder="Новый жанр">
        <button type="submit">Создать</button>
    </form>

    @if ($selectedGenre)
        <form wire:submit.prevent="updateGenre">
            <input type="text" wire:model="name">
            <button type="submit">Обновить</button>
        </form>
    @endif

    <ul>
        @foreach ($genres as $genre)
            <li>
                {{ $genre->name }}
                <button wire:click="editGenre({{ $genre->id }})">Редактировать</button>
                <button wire:click="deleteGenre({{ $genre->id }})">Удалить</button>
               
            </li>
        @endforeach
        
    </ul>
    
</div>

