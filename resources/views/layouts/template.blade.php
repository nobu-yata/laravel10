<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite([
    'resources/scss/common/default.scss',
    'resources/scss/common/forms.scss',
    'resources/scss/common/button.scss',
    'resources/scss/common/table.scss',
    'resources/scss/common/text.scss',
    'resources/js/app.js'
    ])
</head>

<body>
    <header>
        <div class="site-title"> {{ $title }} </div>
    </header>
    @yield('contents')
    <footer>
    Laravel Test
</footer>
</body>

</html>