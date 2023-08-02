<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\News;
use App\Models\Knowhow;
use App\Models\Score;
use App\Models\Language;

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
        $items2 = Knowhow::orderBy('created_at', 'desc')
            ->where('is_show', 1)
            ->take(6)
            ->get();
        $knowhows = [
            'items2' => $items2,
        ];



        // リンクボタンによって指定されたレベルを取得（デフォルトは1：初級）
        $selectedLevel = $request->query('level_id', 1);

        // データベースからすべてのLanguageのデータを取得
        $languages = Language::all();

        // 各Languageに対応するScoreデータを取得
        $scoresByLanguage = [];
        foreach ($languages as $language) {
            $scores = Score::where('language_id', $language->id)
                ->where('level_id', $selectedLevel) // レベル別のスコアを取得
                ->where('is_show', 1)
                ->orderBy('score', 'desc')
                ->take(3)
                ->get();

            $scoresByLanguage[$language->id] = $scores;
        }


        // データベースから渡したいデータを配列変数に入れて一括で渡す
        $data = [
            'news' => $news,
            'knowhows' => $knowhows,
        ];

        // viewの引数っていくつでも増やせる
        //return view('main.index', $data1,$data2…);
        return view('fronts.index', $data, compact('languages', 'scoresByLanguage', 'selectedLevel'));
    }
}
