<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function authors()
    {
        return $this->belongsToMany(Author::class, 'author_genre', 'genre_id', 'author_id');
    }

    public function books()
    {
        return $this->belongsToMany(Book::class);
    }
}

