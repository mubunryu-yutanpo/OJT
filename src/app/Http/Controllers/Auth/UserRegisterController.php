<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRegisterRequest;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;
use Illuminate\Support\Facades\Hash;

class UserRegisterController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }
    /**
     * 新規登録画面を表示
     * @return View
     */
    public function register(): View
    {
        return view('Auth.register');
    }

    /**
     * 新規登録処理
     * @param UserRegisterRequest $request
     * @return RedirectResponse
     */
    public function store(UserRegisterRequest $request):RedirectResponse
    {
        $result = $this->userService->createUser($request->validated());

        if($result){
            return redirect()->route('login')->with('success', 'ユーザー登録が完了しました');
        }else{
            return redirect()->back()->with('error', '登録に失敗しました');
        }
    }
}
