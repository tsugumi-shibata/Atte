@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

@section('content')

<div class="content">
    <h2>ログイン</h2>
    <form class="form" action="{{ route('login') }}" method="post">
        @csrf
        <div class="form-group">
            <div class="error">
                @error('email')
                {{ $message }}
                @enderror
            </div>
            <input type="email" id="email" name="email" placeholder="メールアドレス" value="{{ old('email') }}">

        </div>
        <div class="form-group">
            <div class="error">
                @error('password')
                {{ $message }}
                @enderror
            </div>
            <input type="password" id="password" name="password" placeholder="パスワード">

        </div>
        <button type="submit" class="login-button">ログイン</button>
    </form>
    <div class=register>
        <div class="text">
            アカウントをお持ちでない方はこちらから
        </div>
        <div class="register-link">
            <a href="{{ route('register') }}">会員登録</a>
        </div>


@endsection