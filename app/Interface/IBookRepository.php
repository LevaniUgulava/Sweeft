<?php

namespace App\Interface;

use App\Http\Requests\BookRequest;
use Illuminate\Http\Request;

interface IBookRepository
{
    public function index($title, $author);
    public function store(BookRequest $request);
    public function show($id);
    public function update($id, BookRequest $request);
    public function delete($id);
    public function count();
}
