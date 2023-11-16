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
        <div class="site-title">登録内容一覧</div>
    </header>
    <div class='mb-2'>
        {{ Form::open(['route' => 'articles.create']) }}
        {{ Form::button('追加', 
            ['type' => 'submit','class' => 'btn btn-primary btn-sm me-2'],
            ) }}
        {{ Form::close() }}
    </div>
    <main class="container">
        <table class="table table-striped table-hover summary-table mb-4">
            <thead>
                <tr>
                    <th>タイトル</th>
                    <th>内容</th>
                    <th>機能</th>
                </tr>

                @foreach ($articles as $article)
                <tr>
                    <td> {{ $article->title }} </td>
                    <td> {{ $article->body }} </td>
                    <td>
                        <div>
                            {{ Form::open(['route' => ['articles.edit', 'id' => $article->id]]) }}
                            {{ Form::button('編集', 
                            ['type' => 'submit','class' => 'btn btn-secondary btn-sm me-2']) }}
                            {{ Form::close() }}
                        </div>
                    </td>
                </tr>
                @endforeach
            </thead>
        </table>
        <div class="article-count">全部で{{ $count }}件です。</div>
    </main>
    <footer>
        Laravel Test
    </footer>
</body>

</html>