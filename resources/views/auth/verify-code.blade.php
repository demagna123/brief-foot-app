@extends('layouts.app')

@section('content')

<style>
    .form-container {
        max-width: 500px;
        margin: 50px auto;
        background-color: #f9f9f9;
        padding: 40px;
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        font-family: 'Segoe UI', sans-serif;
    }

    .form-container h1 {
        text-align: center;
        margin-bottom: 30px;
        color: #2c3e50;
    }

    .form-container label {
        display: block;
        margin-bottom: 8px;
        font-weight: bold;
        color: #34495e;
    }

    .form-container input[type="email"],
    .form-container input[type="text"] {
        width: 100%;
        padding: 10px 12px;
        margin-bottom: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
        transition: border-color 0.3s;
    }

    .form-container input:focus {
        border-color: #2980b9;
        outline: none;
    }

    .form-container button {
        width: 100%;
        background-color: #34495e;
        color: white;
        padding: 12px;
        border: none;
        border-radius: 5px;
        font-size: 16px;
        cursor: pointer;
        transition: background-color 0.3s;
        margin-top: 10px;
    }

    .form-container button:hover {
        background-color: #1f6391;
    }

    .error-message {
        color: red;
        font-size: 14px;
        margin-bottom: 10px;
    }
</style>

<div class="form-container">
    <h1>Vérification du code</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="m-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('password.code.verify') }}">
        @csrf

        <label for="email">E-mail</label>
        <input type="email" name="email" value="{{ session('email') }}" readonly>

        <label for="code">Code reçu par e-mail</label>
        <input type="text" name="code" id="code" placeholder="Saisir le code" required>

        <button type="submit">Vérifier le code</button>
    </form>
</div>

@endsection
