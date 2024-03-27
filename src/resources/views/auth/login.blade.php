@extends('layouts.app')


@section('css')
<link rel="stylesheet" href="{{ asset('css/login.css') }}" />
@endsection


@section('content')
<div class="content">
    <div class="form__content">
        <form class="form" action="/login" method="POST">
            @csrf
            <div class="form__heading">
                <h2>Login</h2>
            </div>
            <div class="form__group">
                <div class="form__input">
                    <i class="fas fa-envelope"></i>
                    <input type="email" name="email" placeholder="Email" value="{{ old('email') }}">
                </div>
                @error('email')
                    {{ $message }}
                @enderror
            </div>
            <div class="form__group">
                <div class="form__input">
                    <i class="fa-solid fa-lock"></i>
                    <input type="password" name="password" placeholder="Password">
                </div>
                @error('password')
                    {{ $message }}
                @enderror
            </div>
            <div class="form__button">
                <button class="form__button-submit" type="submit">ログイン</button>
            </div>
        </form>
    </div>
</div>
@endsection