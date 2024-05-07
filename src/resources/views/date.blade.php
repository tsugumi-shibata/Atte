@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/date.css') }}">
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
<div class="content">

    <h2 class="date-navigation">
            <button class="button"> < </button>
                <span class=date>yyyy-m-d</span>
            <button class="button"> > </button>
    </h2>

    <table class="table">
        <thead>
            <tr>
                <th>名前</th>
                <th>勤務開始</th>
                <th>勤務終了</th>
                <th>休憩時間</th>
                <th>勤務時間</th>
            </tr>
        </thead>

        <tbody>
            <tr>
                <td>テスト太郎</td>
                <td>10:00:00</td>
                <td>20:00:00</td>
                <td>01:00:00</td>
                <td>09:00:00</td>
            </tr>
            <tr>
                <td>テスト太郎</td>
                <td>10:00:00</td>
                <td>20:00:00</td>
                <td>01:00:00</td>
                <td>09:00:00</td>
            </tr>
            <tr>
                <td>テスト太郎</td>
                <td>10:00:00</td>
                <td>20:00:00</td>
                <td>01:00:00</td>
                <td>09:00:00</td>
            </tr>
            <tr>
                <td>テスト太郎</td>
                <td>10:00:00</td>
                <td>20:00:00</td>
                <td>01:00:00</td>
                <td>09:00:00</td>
            </tr>
            <tr>
                <td>テスト太郎</td>
                <td>10:00:00</td>
                <td>20:00:00</td>
                <td>01:00:00</td>
                <td>09:00:00</td>
            </tr>
        </tbody>
    </table>

    <div class="pagination">
        <a href="#">1</a>
        <a href="#">2</a>
        <a href="#">3</a>
        <a href="#">4</a>
        <a href="#">5</a>
        <a href="#">6</a>
    </div>
</div>


@endsection

