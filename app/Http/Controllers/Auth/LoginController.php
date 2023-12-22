<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\User;
use Illuminate\Http\Request;


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

    public function login(Article $articles)
    {
        $title = '書き込み一覧';
        $articles = Article::latest()->paginate(5);
        $count = Article::count();
        return redirect()->route('articles.index');
    }
    public function logout()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
