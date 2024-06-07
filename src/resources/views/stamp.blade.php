@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/stamp.css') }}">
@endsection

@section('content')

<div class="content">
    <div class="message">
        <p>{{ Auth::user()->name }}さんお疲れ様です！</p>
    </div>

    @if (session('status'))
        <div class="alert-success">
            {{ session('status') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <div class="stamp">
        <form method="post" action="{{ route('work.start') }}">
            @csrf
            <button class="stamp-button" type="submit">勤務開始</button>
        </form>
        <form method="post" action="{{ route('work.end') }}">
            @csrf
            <button class="stamp-button" type="submit">勤務終了</button>
        </form>

        @if($currentWorkId)
            <form method="post" action="{{ route('break.start',['workId' => $currentWorkId]) }}">
                @csrf
                <button class="stamp-button" type="submit">休憩開始</button>
            </form>
            <form method="post" action="{{ route('break.end',['workId' => $currentWorkId]) }}">
                @csrf
                <button class="stamp-button" type="submit">休憩終了</button>
            </form>
@endif
    </div>
</div>

@endsection



