<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class LoginController extends Controller
{
    /**
     * ログイン画面を表示
     * @return View
    */
    public function login() : View
    {
        return view('Auth.login');
    }

    /**
     * ログイン処理
     * @param Request $request
     * @return ?RedirectResponse
    */
    public function store(LoginRequest $request): ?RedirectResponse
    {
        // ログイン処理
        $user = User::where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            Auth::login($user);

            return redirect()->route('my_page');
        }

        return redirect()->back()->with('error', 'ユーザー情報の取得に失敗しました');
    }

    /**
     * ログアウト
     * @return RedirectResponse
    */
    public function logout(): RedirectResponse
    {
        Auth::logout();

        return redirect()->route('login')->with('success', 'ログアウトしました');
    }
}
