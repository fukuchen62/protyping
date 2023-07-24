<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

        return view('fronts.news_article');
    }
}
