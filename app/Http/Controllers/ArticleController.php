<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;

class ArticleController extends Controller
{
    /**
     * getarticle function
     * 更新情報の一覧を表示する
     * @param Request $request
     * @return void
     */
    public function getarticle(Request $request)
    {
        // 更新情報の一覧を表示する
        $items = News::all();
        $data = [
            'items' => $items,
        ];

        return view('fronts.news_article', $data);
    }
}
