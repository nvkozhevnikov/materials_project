@extends('layouts.rulilka-layout')

@section('content')
    <div class="container">
        <h1>Вход</h1>
        <form method="POST" action="/rulilka">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Ваш email</label>
                <input type="email" class="form-control" id="email" placeholder="Email">
                @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Пароль</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Пароль">
                @error('password')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Check me out</label>
            </div>
            <button type="submit" class="btn btn-primary" name="sendMe">Войти</button>
        </form>
    </div>




@endsection