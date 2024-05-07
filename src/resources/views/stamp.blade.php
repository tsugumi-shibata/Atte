@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/stamp.css') }}">
@endsection

<!-- @section('navigation')
<nav class="navigation">
    <ul>
        <li><a href="#">ホーム</a></li>
        <li><a href="#">日付一覧</a></li>
        <li><a href="#">ログアウト</a></li>
    </ul>
</nav>
@endsection -->


@section('content')
<!-- <div class="content">
    <h2>◯◯さんお疲れ様です!</h2>
    <div class="stamp">
        <button>勤務開始</button>
        <button>勤務終了</button>
        <button>休憩開始</button>
        <button>休憩終了</button>
    </div>
</div> -->

<div class="message">
    <h2>◯◯さんお疲れ様です!</h2>
</div>

<form class="stamp">
    <button class="stamp" type="submit">勤務開始</button>
    <button class="stamp" type="submit">勤務終了</button>
    <button class="stamp" type="submit">休憩開始</button>
    <button class="stamp" type="submit">休憩終了</button>
</form>


@endsection



