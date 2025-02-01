<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\BookRequest;
use App\Interface\IBookRepository;
use App\Models\Author;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    protected IBookRepository $bookRepository;
    public function __construct(IBookRepository $bookRepository)
    {
        $this->bookRepository = $bookRepository;
    }

    public function index(Request $request)
    {
        $title = $request->query('title');
        $author = $request->query('author');
        $authors = Author::all();
        $books = $this->bookRepository->index($title, $author);
        return view("dashboard", compact('books', 'authors'));
    }

    public function create()
    {
        $authors = Author::all();
        return view("books.create", compact('authors'));
    }
    public function store(BookRequest $request)
    {
        $this->bookRepository->store($request);
        return redirect()->back()->with('message', "Created Successfully");
    }
    public function edit($id)
    {
        $book = Book::with('authors')->findorfail($id);
        $authors = Author::all();
        return view("books.edit", compact('authors', 'book'));
    }
    public function update($id, BookRequest $request)
    {
        $this->bookRepository->update($id, $request);
        return redirect()->back()->with('message', "Updated Successfully");
    }
    public function destroy($id)
    {
        $this->bookRepository->delete($id);
        return redirect()->back();
    }
}
