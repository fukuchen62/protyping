<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KnowhowController extends Controller
{
    /**
     * getknowhow function
     * 知っトク記事情報の一覧を表示する
     * @param Request $request
     * @return void
     */
    public function getknowhow(Request $request)
    {
        // 知っトク記事情報の一覧を表示する

        return view('fronts.knowhow_article');
    }

    /**
     * getdetails function
     * 知っトク記事情報の詳細記事を表示する
     * @param Request $request
     * @return void
     */
    public function getdetails(Request $request)
    {
        // 知っトク記事情報の詳細記事を表示する

        return view('fronts.Knowhow_details');
    }
}
