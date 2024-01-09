<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Http\Requests\LoginRequest;
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

    public function login(Article $articles, LoginRequest $request)
    {
        $user_info = $request->only('email','password');

        if (Auth::attempt($user_info)) {
            $request->session()->regenerate();
            $title = '書き込み一覧';
            return redirect()->route('articles.index', compact('title'));
        }
        $title = 'ログイン画面';
        return redirect()->route('login.index', compact('title'))
            ->with('error', '認証に失敗しました。');
    }
    
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login.index');
    }
}
