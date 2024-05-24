@extends('layouts.app')


@section('css')
<link rel="stylesheet" href="{{ asset('css/mypage.css') }}" />
<link rel="stylesheet" href="{{ asset('css/store_card.css') }}" />
@endsection


@section('content')
<div class="content__title">
    <h2>{{ Auth::user()->name }}さん</h2>
</div>
<div class="content__reservation">
    <h3>予約状況</h3>
    <?php $count = 1; ?>
    @if($reservations)
        @foreach($reservations as $reservation)
            <?php $reservation['time'] = mb_substr($reservation['time'], 0, 5); ?>
            <div class="content__reservation--card">
                <table class="content__reservation-table">
                    <tr class="content__reservation-row">
                        <th class="content__reservation-header"><i class="fa-regular fa-clock"></i>予約{{ $count }}</th>
                        <td class="content__reservation-text"></td>
                    </tr>
                    <tr class="content__reservation-row">
                        <th class="content__reservation-header">Shop</th>
                        <td class="content__reservation-text">{{ $reservation['shop']['name'] }}</td>
                    </tr>
                    <tr class="content__reservation-row">
                        <th class="content__reservation-header">Date</th>
                        <td class="content__reservation-date">{{ $reservation['date'] }}</td>
                    </tr>
                    <tr class="content__reservation-row">
                        <th class="content__reservation-header">Time</th>
                        <td class="content__reservation-time">{{ $reservation['time'] }}</td>
                    </tr>
                    <tr class="content__reservation-row">
                        <th class="content__reservation-header">Number</th>
                        <td class="content__reservation-number">{{ $reservation['number'] }}</td>
                    </tr>
                </table>
                <div class="content__reservation--button">
                    <a class="button__change" href="/reservation/change/{{ $reservation['id'] }}">予約変更</a>
                    <form action="/reservation/delete" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" name="reservation_id" value="{{ $reservation['id'] }}">
                        <input class="button__delete" type="submit" value="予約削除" onclick="return click()">
                    </form>
                </div>
            </div>
            <?php $count += 1; ?>
        @endforeach
    @endif
</div>
<div class="content__history">
    <h3>予約履歴</h3>
    <?php $count = 1; ?>
    @if($histories)
        @foreach($histories as $history)
            <?php $history['time'] = mb_substr($history['time'], 0, 5); ?>
            <div class="content__history--card">
                <table class="content__history-table">
                    <tr class="content__history-row">
                        <th class="content__history-header"><i class="fa-regular fa-clock"></i>予約履歴{{ $count }}</th>
                        <td class="content__history-text"></td>
                    </tr>
                    <tr class="content__history-row">
                        <th class="content__history-header">Shop</th>
                        <td class="content__history-text">{{ $history['shop']['name'] }}</td>
                    </tr>
                    <tr class="content__history-row">
                        <th class="content__history-header">Date</th>
                        <td class="content__history-date">{{ $history['date'] }}</td>
                    </tr>
                    <tr class="content__history-row">
                        <th class="content__history-header">Time</th>
                        <td class="content__history-time">{{ $history['time'] }}</td>
                    </tr>
                    <tr class="content__history-row">
                        <th class="content__history-header">Number</th>
                        <td class="content__history-number">{{ $history['number'] }}</td>
                    </tr>
                </table>
                <div class="content__history--button">
                    <a class="button__evaluation" href="/evaluation/{{ $history['id'] }}">評価する</a>
                </div>
            </div>
            <?php $count += 1; ?>
        @endforeach
    @endif
</div>
<div class="content__like--area">
    <h3>お気に入り店舗</h3>
    <div class="content__like">
        @foreach($shops as $shop)
            @if (Auth::user()->is_like($shop->id))
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
                        <form action="/destroy/{{ $shop['id'] }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="like__button"><div class="like clicked"></div></button>
                        </form>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script src="{{ asset('js/reservation.js') }}"></script>

@endsection