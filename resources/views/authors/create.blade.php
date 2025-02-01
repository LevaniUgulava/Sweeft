<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Author') }}
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

        .btn-green {
            background-color: #38a169;
            color: white;
            padding: 12px 20px;
            font-size: 1rem;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease-in-out;
            width: 100%;
        }

        .btn-green:hover {
            background-color: #2f855a;
            transform: scale(1.02);
        }

        .btn-green:active {
            background-color: #276749;
        }

        .header-title {
            font-size: 1.25rem;
            font-weight: bold;
            color: #2d3748;
        }

        .alert-success {
            background-color: rgb(22, 188, 16);
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

    <div class="container">
        <div class="form-wrapper">
            @if(session('message'))
            <div class="alert-success">
                {{ session('message') }}
            </div>
            @endif
            <form action="{{ route('author.store') }}" method="POST">
                @csrf
                <div>
                    <label for="name" class="form-label">Name:</label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}" class="form-input" required>
                    @error('name')
                    <span class="form-error">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit" class="btn-green">Create</button>
            </form>
        </div>
    </div>
</x-app-layout>