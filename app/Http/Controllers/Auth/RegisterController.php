<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
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
    public function store(User $user, RegisterRequest $request)
    {
        $user->fill([
            'name' =>  $request->input('name'),
            'password' => $request->input('password'),
            'email' => $request->input('email'),
        ])->save();

        Auth::login($user);
        $request->session()->regenerate();

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
