<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function index()
    {
        return "Привет, " . Auth::user()->name . "<br> <a href='". route('logout') . "'>Выйти</a>";
    }
}
