@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/date.css') }}">
@endsection

@section('content')
    <h1>メールアドレスの確認</h1>
    <p>確認リンクをメールで送信しました。メールを確認してください。</p>
    @if (session('message'))
        <p>{{ session('message') }}</p>
    @endif
    <form method="POST" action="{{ route('verification.send') }}">
        @csrf
        <button type="submit">認証メールを再送信する</button>
    </form>
