@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

@section('content')

<div class="content">
    <h2>ログイン</h2>
    <form class="form" action="/login" method="post">
        @csrf
         <div class="form-group">
            <input type="email" id="email" name="email" placeholder="メールアドレス" value="{{ old('email') }}">
            <div class="error">
                @error('email')
                {{ $message }}
                @enderror
            </div>
        </div>
        <div class="form-group">
            <input type="password" id="password" name="password" placeholder="パスワード">
            <div class="error">
                @error('password')
                {{ $message }}
                @enderror
            </div>
        </div>
        <button type="submit" class="button">ログイン</button>
    </form>
    <div class=login>
        <div class="text">
            アカウントをお持ちでない方はこちらから
        </div>
        <div class="login-link">
            <a href="/login">会員登録</a>
        </div>


@endsection