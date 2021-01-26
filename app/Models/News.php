<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class News extends Model
{
    use HasFactory;

    protected $table = 'news';

    public function getAllNews(): array
    {
        return DB::table($this->table)
            ->join('categories', 'categories.id', '=', 'news.category_id')
            ->select('news.*', 'categories.title as category_title')
            ->get()
            ->toArray();
    }

    public function getNews(int $id)
    {
        return DB::table($this->table)->find($id);
    }
}
