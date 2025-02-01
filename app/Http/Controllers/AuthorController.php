<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthorRequest;
use App\Interface\IAuthorRepository;
use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    protected IAuthorRepository $authorRepository;
    public function __construct(IAuthorRepository $authorRepository)
    {
        $this->authorRepository = $authorRepository;
    }

    public function index()
    {
        $authors = $this->authorRepository->index();
        return view("authors.dashboard", compact('authors'));
    }
    public function create()
    {
        return view("authors.create");
    }
    public function store(AuthorRequest $request)
    {
        $this->authorRepository->store($request);
        return redirect()->back()->with("message", "Created Succesfully");
    }
    public function edit($id)
    {
        $author = Author::findorfail($id);
        return view("authors.edit", compact('author'));
    }
    public function update($id, AuthorRequest $request)
    {
        $this->authorRepository->update($id, $request);
        return redirect()->back()->with("message", "Updated Succesfully");
    }
    public function destory($id)
    {
        $this->authorRepository->delete($id);
        return redirect()->back();
    }
}
