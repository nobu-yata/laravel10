@extends('layouts.template')
@section('contents')

<main class="container">
    {{ Form::open(['route' => ['auth.store']]) }}
    <table class="table mt-4">
        <tr>
            <th>ユーザー名</th>
            <td>
                <div>{{ Form::text('name') }}</div>
            </td>

        </tr>
        <tr>
            <th>パスワード</th>
            <td>
                <div>{{ Form::password('password') }}</div>
            </td>

        </tr>
        <tr>
            <th>メールアドレス</th>
            <td>
                <div>{{ Form::text('email') }}</div>
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