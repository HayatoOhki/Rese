@extends('layouts.app')


@section('css')
<!-- 同様の為併用 -->
<link rel="stylesheet" href="{{ asset('css/detail.css') }}" />
@endsection


@section('content')
<div class="shop__detail">
    <div class="shop__title">
        <a class="back__button" href="/"><</a>
        <h3>{{ $shop['name'] }}</h3>
    </div>
    <div class="shop__image">
        <img src="{{ $shop['url'] }}" alt="{{ $shop['name'] }}">
    </div>
    <div class="shop__tag">
        <span>{{ $shop['area']['area'] }}</span>
        <span>{{ $shop['genre']['genre'] }}</span>
    </div>
    <div class="shop__text">
        <p>{{ $shop['overview'] }}</p>
    </div>
</div>
<form class="evaluation__form" action="/evaluation" method="POST">
    @csrf
    <div class="evaluation__form--title">
        <h3>店舗評価</h3>
    </div>
    <div class="evaluation__form--subtitle">
        <h4>予約履歴</h4>
    </div>
    <div class="evaluation__form--confirmation">
        <table class="evaluation__form--confirmation-table">
            <tr class="evaluation__form--confirmation-row">
                <th class="evaluation__form--confirmation-header">Shop</th>
                <td class="evaluation__form--confirmation-text">{{ $shop['name'] }}</td>
            </tr>
            <tr class="evaluation__form--confirmation-row">
                <th class="evaluation__form--confirmation-header">Date</th>
                <td id="evaluation__form--confirmation-date">{{ $reservation['date'] }}<td>
            </tr>
            <tr class="evaluation__form--confirmation-row">
                <th class="evaluation__form--confirmation-header">Time</th>
                <td id="evaluation__form--confirmation-time">{{ $reservation['time'] }}</td>
            </tr>
            <tr class="evaluation__form--confirmation-row">
                <th class="evaluation__form--confirmation-header">Number</th>
                <td id="evaluation__form--confirmation-number">{{ $reservation['number'] }}</td>
            </tr>
        </table>
    </div>
    <div class="evaluation__form--subtitle">
        <h4>評価点</h4>
    </div>
    <div class="evaluation__form--evaluation">
        <input class="evaluation__form--evaluation-input" type="radio" id="star5" name="evaluation" value="5">
        <label for="star5"></label>
        <input class="evaluation__form--evaluation-input" type="radio" id="star4" name="evaluation" value="4">
        <label for="star4"></label>
        <input class="evaluation__form--evaluation-input" type="radio" id="star3" name="evaluation" value="3">
        <label for="star3"></label>
        <input class="evaluation__form--evaluation-input" type="radio" id="star2" name="evaluation" value="2">
        <label for="star2"></label>
        <input class="evaluation__form--evaluation-input" type="radio" id="star1" name="evaluation" value="1">
        <label for="star1"></label>
        <div class="error-message">
            @error('evaluation')
                {{ $message }}
            @enderror
        </div>
    </div>
    <div class="evaluation__form--subtitle">
        <h4>コメント</h4>
    </div>
    <div class="evaluation__form--comment">
        <textarea class="evaluation__form--comment-input" name="comment"></textarea>
        <input type="hidden" name="reservation_id" value="{{ $reservation['id'] }}">
        <div class="error-message">
            @error('comment')
                {{ $message }}
            @enderror
        </div>
    </div>
    <div class="evaluation__form--button">
        <button class="evaluation__form--button-submit">評価する</button>
    </div>    
</form>

<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script src="{{ asset('js/reservation.js') }}"></script>

@endsection