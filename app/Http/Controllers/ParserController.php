<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use App\Models\Source;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ParserController extends Controller
{
    public function index()
    {
        $load = \XmlParser::load("http://news.yandex.ru/army.rss");
        $data = $load->parse([
            'title' => [
                'uses' => 'channel.title'
            ],
            'link' => [
                'uses' => 'channel.link'
            ],
            'description' => [
                'uses' => 'channel.description'
            ],
            'image' => [
                'uses' => 'channel.image.url'
            ],
            'news' => [
                'uses' => 'channel.item[title,link,guid,description,pubDate]'
            ]
        ]);

        $title = $data['title'];
        $pieces = explode(' ', $title);
        $title = array_pop($pieces);
        $cat = Category::updateOrCreate(['title' => $title], ['description' => $data['description']]);
        $cat->where('title', $title)->get();

        $newsList = $data['news'];
        foreach ($newsList as $news) {
            $source = Source::updateOrCreate(['url' => $news['link']], ['title' => $news['link']]);
            $source->where('url', $news['link'])->get();
            $array = [
                'category_id' => $cat->id,
                'slug' => Str::slug($news['title']),
                'description' => $news['description'],
                'created_at' => date('Y-m-d H:i:s', strtotime($news['pubDate'])),
                'status' => 'published',
                'source' => $source->id
            ];
            News::updateOrCreate(['title' => $news['title']], $array);
        }
        return redirect()->route('news.index');
    }
}
