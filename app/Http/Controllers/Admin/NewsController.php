<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * @return string
     */
    public function index(): string
    {
        return "Список новостей";
    }

    /**
     * @param string $slug
     * @param int $id
     * @return string
     */
    public function edit(string $slug, int $id): string
    {
        return "Редактировать новость #ID {$id}, слаг {$slug}";
    }
}
