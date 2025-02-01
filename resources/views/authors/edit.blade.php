<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Author') }}
        </h2>
    </x-slot>

    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f9fafb;
            color: #4a5568;
        }

        form {
            background-color: #fff;
            border-radius: 8px;
            padding: 30px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        div {
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
            font-size: 1rem;
        }

        input[type="text"],
        input[type="number"],
        select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 1rem;
            background-color: #f9f9f9;
        }

        input[type="text"]:focus,
        input[type="number"]:focus,
        select:focus {
            border-color: #3182ce;
            outline: none;
        }

        span {
            color: red;
            font-size: 0.875rem;
            margin-top: 5px;
        }

        .btn-warning {
            background-color: #d69e2e;
            color: white;
            padding: 12px 20px;
            font-size: 1rem;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease-in-out;
            width: 100%;
        }

        .btn-warning:hover {
            background-color: #b7791f;
            transform: scale(1.02);
        }

        .btn-warning:active {
            background-color: #9c6b16;
        }

        .alert-success {
            background-color: rgb(200, 136, 25);
            color: white;
            width: 50%;
            padding: 15px;
            border-radius: 5px;
            margin: 20px auto;
            text-align: center;
            font-size: 1rem;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .alert-success:hover {
            opacity: 0.9;
        }
    </style>
    @if(session('message'))
    <div class="alert-success">
        {{ session('message') }}
    </div>
    @endif


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('author.update',$author->id) }}" method="POST">
                        @csrf
                        @METHOD("PUT")

                        <div>
                            <label for="name">name:</label>
                            <input type="text" id="title" name="name" value="{{ $author->name }}" required>
                            @error('title')
                            <span>{{ $message }}</span>
                            @enderror
                        </div>

                        <button type="submit" class="btn-warning">Edit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>