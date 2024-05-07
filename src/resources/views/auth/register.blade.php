@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endsection

@section('content')

<div class="content">
    <h2>会員登録</h2>
    <form class="form" action="/register" method="post">
        @csrf
        <div class="form-group">
            <input type="text" id="name" name="name" placeholder="名前" value="{{ old('name') }}">
            <div class="error">
                @error('name')
                {{ $message }}
                @enderror
            </div>
        </div>
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
        <div class="form-group">
            <input type="password" id="password_confirmation" name="password_confirmation" placeholder="確認用パスワード">
            <div class="error">
                @error('password_confirmation')
                {{ $message }}
                @enderror
            </div>
        </div>
        <button type="submit" class="button">会員登録</button>
    </form>
    <div class=login>
        <div class="text">
            アカウントをお持ちの方はこちらから
        </div>
        <div class="login-link">
            <a href="/login">ログイン</a>
        </div>
        
    </div>
</div>


@endsection