@extends('layouts.template')
@section('contents')

<main class="container">
    {{ Form::open(['route' => ['articles.store']]) }}
    <table class="table mt-4">
        <tr>
            <th>タイトル</th>
            <td>
                <div>{{ Form::text('title') }}</div>
            </td>

        </tr>
        <tr>
            <th>内容</th>
            <td>
                <div>{{ Form::textarea('body') }}</div>
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