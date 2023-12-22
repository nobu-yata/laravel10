<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    @vite([
    'resources/sass/app.scss',
    'resources/sass/default.scss',
    'resources/sass/forms.scss',
    'resources/sass/button.scss',
    'resources/sass/table.scss',
    'resources/sass/text.scss',
    'resources/sass/message.scss',
    'resources/js/app.js'
    ])
</head>

<body>
    <header>
        <div>{{ $title }}</div>
        @if (Auth::check())
        <div style='text-align:right;'>
            <a id="logout" href="{{route('login.logout')}}"  class="nav-link fw-bold">ログアウト</a>
        </div>
        @endif
    </header>
    @if (session('success'))
    <div class="message success">
        {{ session('success') }}
    </div>
    @endif
    @if (session('error'))
    <div class="message error">
        {{ session('error') }}
    </div>
    @endif
    @if ($errors->any())
    <div class="message error">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    @yield('contents')
    <footer>
        Laravel Test
    </footer>
</body>

</html>