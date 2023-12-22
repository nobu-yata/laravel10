@extends('layouts.template')
@section('contents')

<main class="container">
    <table class="table mt-4">
        <tr>
            <div class="mt-2 mb-2">
                {{ Form::open(['method' => 'get',
                    'route' => 'auth.create',
                    'style'=>'display: inline']) }}
                {{ Form::button('ユーザー新規登録はこちら', 
                    ['type' => 'submit',
                    'class' => 'btn btn-primary btn-sm me-2',],
                    ) }}
                {{ Form::close() }}
            </div>
        </tr>
        {{ Form::open(['route' => ['login.login']]) }}
        <tr>
            <th>Eメールアドレス</th>
            <td>
                <div>{{ Form::text('email') }}</div>
            </td>

        </tr>
        <tr>
            <th>パスワード</th>
            <td>
                <div>{{ Form::password('password') }}</div>
            </td>

        </tr>
    </table>
    <br>
    {{ Form::button('ログイン', 
            ['type' => 'submit'],
            ['class' => 'btn btn-primary btn-sm me-2']) }}
    {{ Form::close() }}
    <br>
    <a href="{{route('login.index')}}">{{__('戻る')}}</a>
</main>
@endsection