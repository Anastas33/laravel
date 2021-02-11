<?php

namespace App\Http\Controllers;

use App\Jobs\JobNewsParsing;
use App\Models\Category;
use App\Models\News;
use App\Models\Resource;
use App\Models\Source;
use App\Service\ParsingService;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ParserController extends Controller
{
    public function index()
    {
        $sources = Source::all();
        foreach ($sources as $source) {
            JobNewsParsing::dispatch(new ParsingService($source->url));
        }

        return "Спасибо, мы уже начали выполнять ваше задание";
    }

    public function addNews()
    {
        $sources = Source::all();
        foreach ($sources as $source) {
            (new ParsingService($source->url))->addNews();
        }

        return redirect()->route('news.index');
    }
}
