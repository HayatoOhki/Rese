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
<form class="reservation__form" action="/reservation/update" method="POST">
    @csrf
    @method('PATCH')
    <div class="reservation__form--title">
        <h3>予約変更</h3>
    </div>
    <div class="reservation__form--item">
        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
        <input type="hidden" name="shop_id" value="{{ $shop['id'] }}">
        <input type="hidden" name="reservation_id" value="{{ $reservation['id'] }}">
        <input id="reservation__form--input-date" type="date" name="date" value="{{ $reservation['date'] }}">
        <div class="error-message">
            @error('date')
                {{ $message }}
            @enderror
        </div>
        <select id="reservation__form--select-time" name="time">
            <option value="{{ $reservation['time'] }}" selected>{{ $reservation['time'] }}</option>
            @for($hour = 16; $hour < 24; $hour++)
                @for($min = 0; $min < 6; $min += 3)
                    <option value="{{ $hour }}:{{ $min }}0">{{ $hour }}:{{ $min }}0</option>
                @endfor
            @endfor
        </select>
        <div class="error-message">
            @error('time')
                {{ $message }}
            @enderror
        </div>
        <select id="reservation__form--select-number" name="number">
            <option value="{{ $reservation['number'] }}" selected>{{ $reservation['number'] }}</option>
            @for($number = 1; $number <= 10; $number++)
                <option value="{{ $number }}人">{{ $number }}人</option>
            @endfor
        </select>
        <div class="error-message">
            @error('number')
                {{ $message }}
            @enderror
        </div>
    </div>
    <div class="reservation__form--confirmation">
        <table class="reservation__form--confirmation-table">
            <tr class="reservation__form--confirmation-row">
                <th class="reservation__form--confirmation-header">Shop</th>
                <td class="reservation__form--confirmation-text">{{ $shop['name'] }}</td>
            </tr>
            <tr class="reservation__form--confirmation-row">
                <th class="reservation__form--confirmation-header">Date</th>
                <td id="reservation__form--confirmation-date">{{ $reservation['date'] }}<td>
            </tr>
            <tr class="reservation__form--confirmation-row">
                <th class="reservation__form--confirmation-header">Time</th>
                <td id="reservation__form--confirmation-time">{{ $reservation['time'] }}</td>
            </tr>
            <tr class="reservation__form--confirmation-row">
                <th class="reservation__form--confirmation-header">Number</th>
                <td id="reservation__form--confirmation-number">{{ $reservation['number'] }}</td>
            </tr>
        </table>
    </div>
    <div class="reservation__form--button">
        <button class="reservation__form--button-submit">予約変更する</button>
    </div>    
</form>

<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script src="{{ asset('js/reservation.js') }}"></script>

@endsection