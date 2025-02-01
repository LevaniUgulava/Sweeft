<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container">
            <div class="header-actions">
                <a href="{{ route('books.create') }}">
                    <button class="btn-green">Create Book</button>
                </a>
                <a href="{{ route('author.index') }}">
                    <button class="btn-blue">Authors</button>
                </a>
            </div>

            <div class="filter-section">
                <form method="GET" action="{{ route('dashboard') }}" class="filter-form">
                    <input
                        type="text"
                        name="title"
                        value="{{ request('title') }}"
                        placeholder="Search by Title"
                        class="search-input" />
                    <select name="author" class="author-select">
                        <option value="">Select Author</option>
                        @foreach($authors as $author)
                        <option value="{{ $author->id }}" {{ request('author') == $author->id ? 'selected' : '' }}>
                            {{ $author->name }}
                        </option>
                        @endforeach
                    </select>
                    <button class="btn-search">Search</button>
                </form>
            </div>

            <div class="books-container">
                @forelse($books as $book)
                <div class="book-card">
                    <h3 class="book-title">{{ $book->title }}</h3>
                    <p class="book-year">Year: {{ $book->year_of_publication }}</p>
                    <p class="book-status">Status: {{ ucfirst($book->status) }}</p>
                    <div class="card-actions">
                        <a href="{{ route('books.edit', $book->id) }}">
                            <button class="btn-warning">Edit</button>
                        </a>
                        <form action="{{ route('books.destroy', $book->id) }}" method="POST" class="delete-form">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-red">Delete</button>
                        </form>
                    </div>
                </div>
                @empty
                <p class="no-books-found">No books found</p>
                @endforelse
            </div>
        </div>
    </div>

    <style>
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .header-actions {
            display: flex;
            gap: 16px;
            margin-bottom: 20px;
        }

        .filter-section {
            margin-top: 20px;
            display: flex;
            justify-content: space-between;
            gap: 16px;
        }

        .filter-form {
            display: flex;
            gap: 12px;
            width: 100%;
        }

        .search-input {
            padding: 10px;
            width: 50%;
            border: 1px solid #ccc;
            border-radius: 6px;
        }

        .author-select {
            padding: 10px;
            width: 40%;
            border: 1px solid #ccc;
            border-radius: 6px;
        }

        .books-container {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
            margin-top: 20px;
        }

        .book-card {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
        }

        .book-card:hover {
            transform: scale(1.02);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        }

        .book-title {
            font-size: 1.25rem;
            font-weight: bold;
            color: #333;
        }

        .book-year,
        .book-status {
            font-size: 1rem;
            color: #666;
        }

        .card-actions {
            display: flex;
            justify-content: space-between;
            margin-top: 16px;
        }

        .delete-form {
            display: inline;
        }

        .btn-green,
        .btn-blue,
        .btn-warning,
        .btn-red {
            padding: 12px 20px;
            font-size: 1rem;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            width: 100%;
        }

        .btn-green {
            background-color: #38a169;
            color: white;
        }

        .btn-green:hover {
            background-color: #2f855a;
            transform: scale(1.05);
        }

        .btn-blue {
            background-color: #3182ce;
            color: white;
        }

        .btn-blue:hover {
            background-color: #2b6cb0;
            transform: scale(1.05);
        }

        .btn-warning {
            background-color: #d69e2e;
            color: white;
        }

        .btn-warning:hover {
            background-color: #b7791f;
            transform: scale(1.05);
        }

        .btn-red {
            background-color: #e53e3e;
            color: white;
        }

        .btn-red:hover {
            background-color: #c53030;
            transform: scale(1.05);
        }

        .no-books-found {
            font-size: 1.2rem;
            color: #888;
            text-align: center;
            margin-left: 400px;
            margin-top: 40px;
        }

        .btn-search {
            background-color: #007bff;
            color: white;
            padding: 12px 20px;
            font-size: 1rem;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease-in-out;
            width: 30%;
        }

        .btn-search:hover {
            background-color: #0056b3;
            transform: scale(1.01);
        }

        .btn-search:active {
            background-color: #004085;
        }
    </style>
</x-app-layout>