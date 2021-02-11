<?php


namespace App\Service;


use App\Models\Category;
use App\Models\News;
use App\Models\Source;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ParsingService
{
    protected $url;

    /**
     * ParsingService constructor.
     * @param string $url
     */
    public function __construct(string $url)
    {
        $this->url = $url;
    }

    protected function load()
    {
        return \XmlParser::load($this->url);
    }

    /**
     * @return array
     */
    public function getData(): array
    {
        $load = $this->load();
        return $load->parse([
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
    }

    public function saveData(): void
    {
        $json = json_encode($this->getData());
        Storage::disk('local')->put($this->url . ".txt", $json);
    }

    public function addNews()
    {
        $data = $this->getData();
        $title = $data['title'];
        $pieces = explode(' ', $title);
        $title = array_pop($pieces);
        $cat = Category::updateOrCreate(['title' => $title], ['description' => $data['description']]);
        Category::where('title', $title)->get();

        $newsList = $data['news'];
        foreach ($newsList as $news) {
            $source = Source::where('url', '=', $this->url)->get();
            $array = [
                'category_id' => $cat->id,
                'slug' => Str::slug($news['title']),
                'description' => $news['description'],
                'created_at' => date('Y-m-d H:i:s', strtotime($news['pubDate'])),
                'status' => 'published',
                'source_id' => $source[0]->id
            ];
            News::updateOrCreate(['title' => $news['title']], $array);
        }
    }
}
