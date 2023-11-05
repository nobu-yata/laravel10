<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/main.css">
</head>

<body>
    <header>
        <div class="site-title">登録内容一覧</div>
    </header>
    <main class="container">
        <table border="1">
            <tr>
                <td>
                    <div class="article-title">タイトル</div>
                </td>
                <td>
                    <div class="article-title">内容</div>
                </td>
                <td>
                    <div class="article-title">機能</div>
                </td>
            </tr>

            @foreach ($articles as $article)
            <tr>
                <td>
                    <div class="article-title">{{ $article->title }}</div>
                </td>
                <td>
                    <div class="article-body">{{ $article->body }}</div>
                </td>
            </tr>
            @endforeach
        </table>
        <div class="article-count">全部で{{ $count }}件です。</div>
    </main>
    <footer>
        Laravel Test
    </footer>
</body>

</html>