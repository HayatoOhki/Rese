@extends('layouts.app')


@section('css')
<link rel="stylesheet" href="{{ asset('css/thanks.css') }}" />
@endsection


@section('content')
<div class="content">
    <div class="form__content">
        <form class="form" action="/login" method="GET">
            <div class="form__heading">
                <h2>評価ありがとうございます</h2>
            </div>
            <div class="form__button">
                <a class="form__button-submit" href="/mypage">戻る</a>
            </div>
        </form>
    </div>
</div>
@endsection