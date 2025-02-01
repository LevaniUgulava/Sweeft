<?php

namespace App\Repository;

use App\Interface\IBookRepository;
use App\Models\Book;
use App\Http\Requests\BookRequest;
use Illuminate\Http\Request;

class BookRepository implements IBookRepository
{
    public function index($title, $author)
    {
        return Book::when($title, fn($query) => $query->filtertitle($title))
            ->when($author, fn($query) => $query->filterauthor($author))
            ->get();
    }

    public function store(BookRequest $request)
    {
        $validated = $request->validated();
        $book = Book::create([
            "title" => $validated['title'],
            "year_of_publication" => $validated['year_of_publication'],
            "status" => $validated['status']
        ]);
        $book->authors()->attach($validated['authors']);
        return redirect()->back();
    }

    public function show($id)
    {
        return Book::findOrFail($id);
    }

    public function update($id, BookRequest $request)
    {
        $book = Book::findOrFail($id);
        $validated = $request->validated();
        $book->update($validated);
        return redirect()->back();;
    }

    public function delete($id)
    {
        $book = Book::findOrFail($id);
        $book->delete();
        return $book;
    }

    public function count()
    {
        return Book::count();
    }
}
