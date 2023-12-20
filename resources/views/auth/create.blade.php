@extends('layouts.template')
@section('contents')

<main class="container">
    {{ Form::open(['route' => ['auth.store']]) }}
    <table class="table mt-4">
        <tr>
            <th>メールアドレス</th>
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
        <tr>
            <th>パスワード（確認用）</th>
            <td>
                <div>{{ Form::password('password_confirmation') }}</div>
            </td>
        </tr>
        <tr>
            <th>お名前</th>
            <td>
                <div>{{ Form::text('name') }}</div>
            </td>
        </tr>
    </table>
    <br>
    {{ Form::button('ユーザー登録', 
            ['type' => 'submit'],
            ['class' => 'btn btn-primary btn-sm me-2']) }}
    {{ Form::close() }}
    <br>
    <a href="{{route('login.index')}}">{{__('戻る')}}</a>
</main>
@endsection