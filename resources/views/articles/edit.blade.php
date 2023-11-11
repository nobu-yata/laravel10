<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/scss/common/table.scss', 'resources/js/app.js'])
</head>

<body>
    <header>
        <div class="site-title">登録内容変更</div>
    </header>
    <main class="container">
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
                    <div class="article-title">{{ Form::text('title', $article->title) }}</div>
                </td>
                <td>
                    <div class="article-title">{{ Form::text('article', $article->body) }}</div>
                </td>
            </tr>

        </table>
        <a href="{{route('articles.index')}}">戻る</a>
    </main>
    <footer>
        Laravel Test
    </footer>
</body>

</html>