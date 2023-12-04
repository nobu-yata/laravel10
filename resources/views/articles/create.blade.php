@extends('layouts.template')
@section('contents')

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
@endsection