<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $title = 'ユーザー登録';
        return view('auth.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(User $user, Request $request)
    {
        $request->validate(
            [
                'name' => [
                    'required',
                ],
                'password' => [
                    'required'
                ],
                'email' => [
                    'required'
                ],

            ],
            [
                'name.required' => '名前は必須項目です。',
                'password.required' => 'パスワードは必須項目です。',
                'email.required' => 'Eメールアドレスは必須項目です。'
            ]
        );


        $user->fill([
            'name' =>  $request->input('name'),
            'password' => $request->input('password'),
            'email' => $request->input('email'),
        ])->save();


        return redirect()->route('login.index')
            ->with('success', '登録しました。');
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
