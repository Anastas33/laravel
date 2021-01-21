<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;

class AllNewsController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $news = (new News())->getAllNews();
        $categories = (new Category())->getAllCategories();
        return view('guest.news.showAllNews', [
            'newsList' => $news,
            'categories' => $categories
        ]);
    }
}
