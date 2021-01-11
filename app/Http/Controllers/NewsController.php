<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class NewsController extends Controller
{
    public function showCategories()
    {
        if(!empty($this->categories)) {
            return view('news.showCategories', [
                'categories' => $this->categories
            ]);
        }

        return redirect('/');
    }

    /**
     * @param int $id
     */
    public function showAllNewsOfCategory(int $id)
    {
        $news = Arr::where($this->news, function ($value, $key) use ($id) {
            if($value['category_id'] == $id) {
                return $value;
            }
        });

        if(!empty($news)) {
            return view('news.showAllNewsOfCategory', [
                'news' => $news,
                'categories' => $this->categories,
                'id' => $id
            ]);
        }

        return redirect()->route('categories');
    }

    /**
     * @param int $categoryId
     * @param int $id
     */
    public function showOneNews(int $categoryId, int $id)
    {
        $news = Arr::where($this->news, function ($value, $key) use ($id, $categoryId) {
            if($value['category_id'] == $categoryId && $key == $id) {
                return $value;
            }
        });

        if(isset($news[$id])) {
            $news = $news[$id];
        }

        if(!empty($news)) {
            return view('news.showOneNews', [
                'news' => $news,
                'categoryId' => $categoryId
            ]);
        }

        return redirect()->route('categories.id', ['id' => $categoryId]);
    }

    public function showAllNews()
    {
        return view('news.showAllNews', [
            'news' => $this->news,
            'categories' => $this->categories
        ]);
    }
}
