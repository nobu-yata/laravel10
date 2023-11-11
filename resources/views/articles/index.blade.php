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
        <div class="site-title">登録内容一覧</div>
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
                <td>
                    <div>
                        {{ Form::open(['route' => 'articles.edit']) }}
                        {{ Form::hidden('id', $article->id) }}
                        {{ Form::button('編集', 
                            ['type' => 'submit'],
                            ['class' => 'btn btn-primary btn-sm me-2']) }}
                        {{ Form::close() }}
                    </div>
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