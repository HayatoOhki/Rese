@extends('layouts.app')


@section('css')
<!-- loginと同様の為代用 -->
<link rel="stylesheet" href="{{ asset('css/login.css') }}" />
@endsection


@section('content')
<div class="content">
    <div class="form__content">
        <form class="form" action="/register" method="POST">
            @csrf
            <div class="form__heading">
                <h2>Registration</h2>
            </div>
            <div class="form__group">
                <div class="form__input">
                    <i class="fa-solid fa-user"></i>
                    <input type="text" name="name" placeholder="Username">
                </div>
                @error('name')
                    {{ $message }}
                @enderror
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
                <button class="form__button-submit" type="submit">登録</button>
            </div>
        </form>
    </div>
</div>
@endsection