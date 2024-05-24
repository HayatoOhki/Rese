@extends('layouts.app')


@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}" />
<link rel="stylesheet" href="{{ asset('css/store_card.css') }}" />
@endsection


@section('content')
<form class="serach__form" action="/search" method="GET">
    <div class="serach__form--item">
        <select class="search-form__item-select" name="area_id" onchange="submit(this.form)">
            <option value="" selected>All area</option>
            @foreach($areas as $area)
                <option value="{{ $area['id'] }}" @if(old('area_id', $area_id ?? '') == $area->id) selected @endif>{{ $area['area'] }}</option>
            @endforeach
        </select>
        <select class="search-form__item-select" name="genre_id" onchange="submit(this.form)">
            <option value="" selected>All genre</option>
            @foreach($genres as $genre)
                <option value="{{ $genre['id'] }}" @if(old('genre_id', $genre_id ?? '') == $genre->id) selected @endif>{{ $genre['genre'] }}</option>
            @endforeach
        </select>
        <i class="fas fa-search"></i>
        <input class="search-form__item-input" type="text" name="keyword" placeholder="Search…" @isset($keyword) value="{{ $keyword }}" @endisset>
    </div>    
</form>
<div class="main__content">
    @foreach($shops as $shop)
        <div class="store__card">
            <div class="store__card--image">
                <img src="{{ $shop['url'] }}" alt="{{ $shop['name'] }}">
            </div>
            <div class="store__card--title">
                <h3>{{ $shop['name'] }}</h3>
            </div>
            <div class="store__card--tag">
                <span>{{ $shop['area']['area'] }}</span>
                <span>{{ $shop['genre']['genre'] }}</span>
            </div>
            <div class="store__card--button">
                <a class="detail__button" href="/detail/{{ $shop['id'] }}">詳しくみる</a>
                @if (Auth::user()->is_like($shop->id))
                    <form action="/destroy/{{ $shop['id'] }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="like__button"><div class="like clicked"></div></button>
                    </form>
                @else
                    <form action="/store/{{ $shop['id'] }}" method="POST">
                        @csrf
                        <button class="like__button"><div class="like"></div></button>
                    </form>
                @endif
            </div>
        </div>
    @endforeach
</div>
@endsection