<?php

namespace App\Interface;

use App\Http\Requests\AuthorRequest;
use App\Http\Requests\BookRequest;

interface IAuthorRepository
{
    public function index();
    public function store(AuthorRequest $request);
    public function show($id);
    public function update($id, AuthorRequest $request);
    public function delete($id);
}
