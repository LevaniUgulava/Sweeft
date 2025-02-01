<?php

namespace App\Repository;

use App\Http\Requests\AuthorRequest;

use App\Interface\IAuthorRepository;
use App\Models\Author;

class AuthorRepository implements IAuthorRepository
{
    public function index()
    {
        return Author::all();
    }
    public function store(AuthorRequest $request)
    {
        $validated = $request->validated();
        return Author::create($validated);
    }
    public function show($id) {}
    public function update($id, AuthorRequest $request)
    {
        $Author = Author::findOrFail($id);
        $validated = $request->validated();
        $Author->update($validated);
        return redirect()->back();;
    }
    public function delete($id)
    {
        $Author = Author::findOrFail($id);
        $Author->delete();
        return $Author;
    }
}
