<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     *
     */
    public function index()
    {
        return view('admin.news.index', [
            'news' => $this->news,
            'categories' => $this->categories
        ]);
    }

    public function create()
    {
        return view('admin.news.create');
    }

    /**
     * @param int $id
     */
    public function edit(int $id)
    {
        return view('admin.news.edit', [
            'id' => $id
        ]);
    }
}
