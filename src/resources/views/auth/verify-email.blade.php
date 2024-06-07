<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>メール認証</title>
</head>
<body>
    <h1>メールアドレスの確認</h1>
    <p>確認リンクをメールで送信しました。メールを確認してください。</p>
    @if (session('message'))
        <p>{{ session('message') }}</p>
    @endif
    <form method="POST" action="{{ route('verification.send') }}">
        @csrf
        <button type="submit">認証メールを再送信する</button>
    </form>
</body>
</html>