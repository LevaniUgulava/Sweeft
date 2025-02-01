<x-app-layout>
    <x-slot name="header">
        <h2 class="header-title">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="content-container">
        <div class="inner-container">
            <div class="actions-container">
                <a href="{{ route('author.create') }}">
                    <button class="btn-green">Create Author</button>
                </a>
                <a href="{{ route('dashboard') }}">
                    <button class="btn-blue">Back to Book</button>
                </a>
            </div>

            <div class="authors-list-container">
                <h3 class="authors-header">Authors List</h3>
                @if($authors->isEmpty())
                    <p class="no-authors-message">No authors found.</p>
                @else
                    <ul class="authors-list">
                        @foreach($authors as $author)
                        <li class="author-item">
                            <div class="author-info">
                                <span class="author-name">{{ $author->name }}</span>
                                <div class="actions">
                                    <a href="{{ route('author.edit', $author->id) }}">
                                        <button class="btn-warning">Edit</button>
                                    </a>
                                    <form action="{{ route('author.destroy', $author->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this author?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-red">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>
    </div>

    <style>
        .header-title {
            font-size: 1.25rem;
            font-weight: bold;
            color: #2d3748;
        }

        .content-container {
            padding: 3rem 0;
        }

        .inner-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .actions-container {
            display: flex;
            gap: 16px;
            margin-bottom: 20px;
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

        .authors-list-container {
            margin-top: 24px;
        }

        .authors-header {
            font-size: 1.25rem;
            font-weight: bold;
            color: #2d3748;
        }

        .authors-list {
            display: grid;
            grid-template-columns: repeat(1, 1fr);
            gap: 16px;
            margin-top: 20px;
        }

        .author-item {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s ease, box-shadow 0.2s ease-in-out;
        }

        .author-item:hover {
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
            transform: translateY(-5px);
        }

        .author-info {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .author-name {
            font-size: 1.125rem;
            font-weight: bold;
            color: #333;
        }

        .actions {
            display: flex;
            gap: 8px;
        }

        .no-authors-message {
            font-size: 1rem;
            color: #6b7280;
            text-align: center;
            padding: 20px;
        }
    </style>
</x-app-layout>
