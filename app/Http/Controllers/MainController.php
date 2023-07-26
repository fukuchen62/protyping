<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\News;
use App\Models\Knowhow;
use App\Models\Score;

class MainController extends Controller
{
    /**
     * index function
     * トップページに表示させるデータを取得
     *
     * @param Request $request
     * @return void
     */
    public function index(Request $request)
    {
        // 更新情報のデータ3件分を取得
        $items = News::orderBy('created_at', 'desc')->take(3)->get();
        $news = [
            'items' => $items,
        ];

        // 知っトク情報を最新の６件分取得
        // $items2 = Knowhow::all();
        $items2 = Knowhow::orderBy('created_at', 'desc')->take(6)->get();
        $knowhows = [
            'items2' => $items2,
        ];

        // HTMLでスコアが高い順にデータを３件分取得
        // $items3 = Score::all();
        // 1：HTML
        $items3 = Score::where('language_id', 1)->orderBy('score', 'desc')->take(3)->get();
        $scoresHTML = [
            'items3' => $items3,
        ];

        // CSSでスコアが高い順にデータを３件分取得
        // 2：CSS
        $items4 = Score::where('language_id', 2)->orderBy('score', 'desc')->take(3)->get();
        $scoresCSS = [
            'items4' => $items4,
        ];

        // JavaScriptでスコアが高い順にデータを３件分取得
        // 3：JavaScript
        $items5 = Score::where('language_id', 3)->orderBy('score', 'desc')->take(3)->get();
        $scoresJS = [
            'items5' => $items5,
        ];

        // PHPでスコアが高い順にデータを３件分取得
        // 4：PHP
        $items6 = Score::where('language_id', 4)->orderBy('score', 'desc')->take(3)->get();
        $scoresPHP = [
            'items6' => $items6,
        ];


        // pythonでスコアが高い順にデータを３件分取得
        // 5：python
        $items7 = Score::where('language_id', 5)->orderBy('score', 'desc')->take(3)->get();
        $scoresPython = [
            'items7' => $items7,
        ];

        // データベースから渡したいデータを配列変数に入れて一括で渡す
        $data = [
            'news' => $news,
            'knowhows' => $knowhows,
            'scoresHTML' => $scoresHTML,
            'scoresCSS' => $scoresCSS,
            'scoresJS' => $scoresJS,
            'scoresPHP' => $scoresPHP,
            'scoresPython' => $scoresPython,
        ];

        // viewの引数っていくつでも増やせる
        //return view('main.index', $data1,$data2…);
        return view('fronts.index', $data);
    }
}
