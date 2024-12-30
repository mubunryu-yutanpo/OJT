<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class MyPageController extends Controller
{
    /**
     * マイページを表示
    */
    public function index(): View
    {
        return view('my_page');
    }
}
