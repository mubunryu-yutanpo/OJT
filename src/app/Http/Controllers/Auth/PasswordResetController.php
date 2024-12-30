<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PasswordResetController extends Controller
{
    /**
     * パスワードリセット画面を表示
     */
    public function index() : View
    {
        return view('Auth.password_reset');
    }
}
