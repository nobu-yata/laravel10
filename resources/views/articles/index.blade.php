@extends('layouts.template')
@section('contents')
<main class="container">
    <table class="table table-striped table-hover summary-table mb-4">
        <thead>
            <tr>
                <div class="mt-2 mb-2">
                    {{ Form::open(['method' => 'get',
                        'route' => 'articles.create',
                        'style'=>'display: inline']) }}
                    {{ Form::button('追加', 
                        ['type' => 'submit',
                        'class' => 'btn btn-primary btn-sm me-2',],
                        ) }}
                    {{ Form::close() }}
                    {{ Form::open(['route' => 'articles.index',
                        'style'=>'display: inline']) }}
                    {{ Form::hidden('csv', '1')}}
                    {{ Form::button('CSVダウンロード', 
                        ['type' => 'submit',
                        'class' => 'btn btn-primary btn-sm me-2',
                        'id' => 'csvdel-btn'],
                        ) }}
                    {{ Form::close() }}
                </div>
            </tr>
            <tr>
                <th>タイトル</th>
                <th>内容</th>
                <th>機能</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($articles as $article)
            <tr>
                <td> {{ $article->title }} </td>
                <td>
                    <pre> {{ $article->body }} </pre>
                </td>
                <td>
                    <div style="display: inline-block; _display: inline;">
                        {{ Form::open(['route' => ['articles.edit', 'id' => $article->id]]) }}
                        {{ Form::button('編集', 
                            ['type' => 'submit','class' => 'btn btn-secondary btn-sm me-2']) }}
                        {{ Form::close() }}
                    </div>
                    <div style="display: inline-block; _display: inline;">
                        {{ Form::open(['route' => ['articles.destroy', 'id' => $article->id]]) }}
                        {{ Form::button('削除', 
                            ['type' => 'submit',
                             'class' => 'btn btn-warning btn-sm me-2',
                             'id' => 'del-btn']) }}
                        {{ Form::close() }}
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div>{{ $articles->links('pagination::bootstrap-4') }}</div>
    <div class="article-count">全部で{{ $count }}件です。</div>
</main>
@endsection