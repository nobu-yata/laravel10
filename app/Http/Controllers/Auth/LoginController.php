<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $title = 'ログイン画面';
        return view('auth.index', compact('title'));
    }

    public function login(Article $articles, Request $request)
    {
        $user_info = $request->validate(
            [
                'email' => [
                    'required',
                ],
                'password' => [
                    'required',
                ],
            ],
            [
                'email.required' => 'Eメールアドレスを入力してください。',
                'password.required' => 'パスワードを入力してください。',
            ]
        );
        print('aaaa');
        if (Auth::attempt($user_info)) {
            $request->session()->regenerate();
            $title = '書き込み一覧';
            return redirect()->route('articles.index', compact('title'));
        }
        $title = 'ログイン画面';
        return redirect()->route('auth.index', compact('title'))
            ->with('error', '認証に失敗しました。');
    }
    public function logout(User $user)
    {
        Auth::logout($user);
        return redirect()->route('login.index');
    }
}
