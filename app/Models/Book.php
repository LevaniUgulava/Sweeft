<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'year_of_publication', 'status'];

    public function authors()
    {
        return $this->belongsToMany(Author::class, 'book_author');
    }

    public function scopeFiltertitle($query, $title)
    {
        if ($title) {
            return $query->where("title", "like", '%' . $title . '%');
        }
        return $query;
    }
    public function scopeFilterauthor($query, $author)
    {
        if ($author) {
            return $query->wherehas("authors",  fn($q) => $q->where('authors.id', $author));
        }
        return $query;
    }
}
