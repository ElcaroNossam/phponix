<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function books()
    {
        return $this->hasMany(Book::class);
    }

    public function genres()
    {
        return $this->belongsToMany(Genre::class, 'author_genre', 'author_id', 'genre_id');
    }
}