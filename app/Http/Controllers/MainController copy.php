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

        // HTMLで難易度１(ゆっくりコース)スコアが高い順にデータを３件分取得
        // $items3 = Score::all();
        // language_id = 1：HTML level_id = 1 ゆっくり
        $items3 = Score::where('language_id', 1)->where('level_id', 1)->orderBy('score', 'desc')->take(3)->get();
        $scoresHTML = [
            'items3' => $items3,
        ];

        // HTMLで難易度２(ダッシュコース)スコアが高い順にデータを３件分取得
        // language_id = 1：HTML level_id = 2 ゆっくり
        $items8 = Score::where('language_id', 1)->where('level_id', 2)->orderBy('score', 'desc')->take(3)->get();
        $scoresHTML2 = [
            'items8' => $items8,
        ];

        // CSSで難易度１(ゆっくりコース)スコアが高い順にデータを３件分取得
        // 2：CSS
        $items4 = Score::where('language_id', 2)->where('level_id', 1)->orderBy('score', 'desc')->take(3)->get();
        $scoresCSS = [
            'items4' => $items4,
        ];

        // CSSで難易度２(ダッシュコース)スコアが高い順にデータを３件分取得
        // 2：CSS
        $items9 = Score::where('language_id', 2)->where('level_id', 2)->orderBy('score', 'desc')->take(3)->get();
        $scoresCSS2 = [
            'items9' => $items9,
        ];

        // JavaScriptで難易度１(ゆっくりコース)スコアが高い順にデータを３件分取得
        // 3：JavaScript
        $items5 = Score::where('language_id', 3)->where('level_id', 1)->orderBy('score', 'desc')->take(3)->get();
        $scoresJS = [
            'items5' => $items5,
        ];

        // JavaScriptで難易度２(ダッシュコース)スコアが高い順にデータを３件分取得
        // 3：JavaScript
        $items10 = Score::where('language_id', 3)->where('level_id', 2)->orderBy('score', 'desc')->take(3)->get();
        $scoresJS2 = [
            'items10' => $items10,
        ];

        // PHPで難易度１(ゆっくりコース)スコアが高い順にデータを３件分取得
        // 4：PHP
        $items6 = Score::where('language_id', 4)->where('level_id', 1)->orderBy('score', 'desc')->take(3)->get();
        $scoresPHP = [
            'items6' => $items6,
        ];

        // PHPで難易度２(ダッシュコース)スコアが高い順にデータを３件分取得
        // 4：PHP
        $items11 = Score::where('language_id', 4)->where('level_id', 2)->orderBy('score', 'desc')->take(3)->get();
        $scoresPHP2 = [
            'items11' => $items11,
        ];

        // pythonで難易度(のんびりコース)スコアが高い順にデータを３件分取得
        // 5：python
        $items7 = Score::where('language_id', 5)->where('level_id', 1)->orderBy('score', 'desc')->take(3)->get();
        $scoresPython = [
            'items7' => $items7,
        ];

        // pythonで難易度(ダッシュコース)スコアが高い順にデータを３件分取得
        // 5：python
        $items12 = Score::where('language_id', 5)->where('level_id', 2)->orderBy('score', 'desc')->take(3)->get();
        $scoresPython2 = [
            'items12' => $items12,
        ];

        // よく使う英単語で難易度(のんびりコース)スコアが高い順にデータを３件分取得
        // 6：よく使う英単語
        $items13 = Score::where('language_id', 6)->where('level_id', 1)->orderBy('score', 'desc')->take(3)->get();
        $scoresEnglish = [
            'items13' => $items13,
        ];

        // よく使う英単語で難易度(ダッシュコース)スコアが高い順にデータを３件分取得
        // 6：よく使う英単語
        $items14 = Score::where('language_id', 6)->where('level_id', 2)->orderBy('score', 'desc')->take(3)->get();
        $scoresEnglish2 = [
            'items14' => $items14,
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
            'scoresHTML2' => $scoresHTML2,
            'scoresCSS2' => $scoresCSS2,
            'scoresJS2' => $scoresJS2,
            'scoresPHP2' => $scoresPHP2,
            'scoresPython2' => $scoresPython2,
            'scoresEnglish' => $scoresEnglish,
            'scoresEnglish2' => $scoresEnglish2,
        ];

        // viewの引数っていくつでも増やせる
        //return view('main.index', $data1,$data2…);
        return view('fronts.index', $data);
    }
}
