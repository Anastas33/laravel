<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class NewsController extends Controller
{
    /**
     * @return string
     */
    public function showCategories(): string
    {
        if(!empty($this->categories)) {
            $html = "<h1>Категории новостей</h1>";
            foreach ($this->categories as $key => $category) {
                $html .= <<<ccc
<h2>
    <a href="/categories/{$key}">{$category['title']}</a>
</h2>
ccc;
            }
            $html .= <<<kkk
<p>
    <a href="/">Вернуться на главную страницу</a>
</p>
kkk;
            return $html;
        }

        return redirect('/');
    }

    /**
     * @param int $id
     * @return string
     */
    public function showAllNewsOfCategory(int $id): string
    {
        $news = Arr::where($this->news, function ($value, $key) use ($id) {
            if($value['category_id'] == $id) {
                return $value;
            }
        });

        if(!empty($news)) {
            $html = "<h1>Новости из категории {$this->categories[$id]['title']}</h1>";
            foreach ($news as $key => $value) {
                $html .= <<<aaa
<h2>
    <a href="/categories/{$id}/news/{$key}">{$value['title']}</a>
</h2>
<hr>
aaa;
            }
            $html .= <<<bbb
<p>
    <a href="/categories">Вернуться назад</a>
</p>
bbb;
            return $html;
        }

        return redirect('/categories');
    }

    /**
     * @param int $categoryId
     * @param int $id
     * @return string
     */
    public function showOneNews(int $categoryId, int $id): string
    {
        $news = Arr::where($this->news, function ($value, $key) use ($id, $categoryId) {
            if($value['category_id'] == $categoryId && $key == $id) {
                return $value;
            }
        })[$id];

        if(!empty($news)) {
            return <<<qqq
<h1>{$news['title']}</h1>
<div>{$news['text']}</div>
<p>
    <a href="/categories/{$categoryId}">Вернуться назад</a>
</p>
qqq;
        }

        return redirect('/categories/{$categoryId}');
    }
}
