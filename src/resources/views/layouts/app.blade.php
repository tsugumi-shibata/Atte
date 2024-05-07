<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atte</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @yield('css')
</head>

<body>
    <header class="header">
        <h1>Atte</h1>

        <nav>
            <ul class="nav">
                @if (Auth::check())
                <li class="nav_item">
                    <a href="#">ホーム</a>
                </li>
                <li class="nav_item">
                    <a href="#">日付一覧</a>
                </li>
                <li class="nav/item">
                    <form class="form" action="/logout" method="post">
                        @csrf
                        <button>ログアウト</button>
                    </form>
                </li>
                @endif
            </ul>
        </nav>
    </header>

    <main>
        @yield('content')
    </main>

    <footer class="footer">
        <small>Atte,inc.</small>

    </footer>
</body>

</html>