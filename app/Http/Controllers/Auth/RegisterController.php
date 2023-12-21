<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
                'email' => [
                    'required',
                    'email',
                    'unique:users',
                ],
                'password' => [
                    'required',
                    'confirmed',
                    'min:8',
                ],
                'name' => [
                    'required',
                ],
            ],
            [
                'email.required' => 'Eメールアドレスは必須項目です。',
                'email.email' => 'Eメールアドレスの形式で入力してください。',
                'email.unique' => 'そのEメールアドレスは既に使用されています。',
                'password.required' => 'パスワードは必須項目です。',
                'password.confirmed' => '確認用パスワードが一致しません。',
                'password.min' => 'パスワードは8文字以上で入力してください。',
                'name.required' => 'お名前は必須項目です。',
            ]
        );


        $user->fill([
            'name' =>  $request->input('name'),
            'password' => password_hash($request->input('password'), PASSWORD_BCRYPT),
            'email' => $request->input('email'),
        ])->save();

        Auth::login($user);

        return redirect()->route('articles.index')
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
