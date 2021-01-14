<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function index(int $id)
    {
        $news = Arr::where($this->news, function ($value, $key) use ($id) {
            if($value['category_id'] == $id) {
                return $value;
            }
        });

        if(!empty($news)) {
            return view('guest.news.showAllNewsOfCategory', [
                'news' => $news,
                'categories' => $this->categories,
                'id' => $id
            ]);
        }

        return redirect()->route('categories.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $categoryId
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $categoryId, int $id)
    {
        $news = Arr::where($this->news, function ($value, $key) use ($categoryId, $id) {
            if($value['category_id'] == $categoryId && $key == $id) {
                return $value;
            }
        });

        if(isset($news[$id])) {
            $news = $news[$id];
        }

        if(!empty($news)) {
            return view('guest.news.showOneNews', [
                'news' => $news,
                'categoryId' => $categoryId
            ]);
        }

        return redirect()->route('categories.show', ['category' => $categoryId]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        //
    }
}
