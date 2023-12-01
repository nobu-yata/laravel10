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
        <div class="site-title">登録内容変更</div>
    </header>
    <main class="container">
        {{ Form::open(['route' => ['articles.store']]) }}
        <table class="table">
            <tr>
                <td>
                    <div class="article-title">タイトル</div>
                </td>
                <td>
                    <div class="article-title">内容</div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="article-title">{{ Form::text('title') }}</div>
                </td>
                <td>
                    <div class="article-title">{{ Form::text('body') }}</div>
                </td>
            </tr>

        </table>
        <br>
        {{ Form::button('新規登録', 
            ['type' => 'submit'],
            ['class' => 'btn btn-primary btn-sm me-2']) }}
        {{ Form::close() }}
        <br>
        <a href="{{route('articles.index')}}">{{__('戻る')}}</a>
    </main>
    <footer>
        Laravel Test
    </footer>
</body>

</html>