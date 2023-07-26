<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Level;
use App\Models\Language;
use App\Models\Score;


class RankingController extends Controller
{

    /**
     * getranking function
     * コース(難易度)別に各言語カテゴリーのランキングTOP10を表示させる
     *
     * @param Request $request
     * @return void
     */
    public function getranking(Request $request)
    {
        // コース(難易度)別に各言語カテゴリーのランキングTOP10を表示させる(デフォルトはのんびりコース)

        // HTMLで難易度１(ゆっくりコース)スコアが高い順にデータを１０件分取得
        // $items1 = Score::all();
        // language_id = 1：HTML level_id = 1 ゆっくり
        $items1 = Score::where('language_id', 1)
            ->where('level_id', 1)
            ->orderBy('score', 'desc')
            ->take(10)
            ->get();
        $scoresHTML = [
            'items1' => $items1,
        ];
        // HTMLで難易度２(ダッシュコース)スコアが高い順にデータを１０件分取得
        // language_id = 1：HTML level_id = 2 ゆっくり
        $items2 = Score::where('language_id', 1)
            ->where('level_id', 2)
            ->orderBy('score', 'desc')
            ->take(10)
            ->get();
        $scoresHTML2 = [
            'items2' => $items2,
        ];

        // CSSで難易度１(ゆっくりコース)スコアが高い順にデータを１０件分取得
        // 2：CSS
        $items3 = Score::where('language_id', 2)
            ->where('level_id', 1)
            ->orderBy('score', 'desc')
            ->take(10)
            ->get();
        $scoresCSS = [
            'items3' => $items3,
        ];
        // CSSで難易度２(ダッシュコース)スコアが高い順にデータを１０件分取得
        // 2：CSS
        $items4 = Score::where('language_id', 2)
            ->where('level_id', 2)
            ->orderBy('score', 'desc')
            ->take(10)
            ->get();
        $scoresCSS2 = [
            'items4' => $items4,
        ];

        // JavaScriptで難易度１(ゆっくりコース)スコアが高い順にデータを１０件分取得
        // 3：JavaScript
        $items5 = Score::where('language_id', 3)
            ->where('level_id', 1)
            ->orderBy('score', 'desc')
            ->take(10)
            ->get();
        $scoresJS = [
            'items5' => $items5,
        ];
        // JavaScriptで難易度２(ダッシュコース)スコアが高い順にデータを１０件分取得
        // 3：JavaScript
        $items6 = Score::where('language_id', 3)
            ->where('level_id', 2)
            ->orderBy('score', 'desc')
            ->take(10)
            ->get();
        $scoresJS2 = [
            'items6' => $items6,
        ];

        // PHPで難易度１(ゆっくりコース)スコアが高い順にデータを１０件分取得
        // 4：PHP
        $items7 = Score::where('language_id', 4)
            ->where('level_id', 1)
            ->orderBy('score', 'desc')
            ->take(10)
            ->get();
        $scoresPHP = [
            'items7' => $items7,
        ];
        // PHPで難易度２(ダッシュコース)スコアが高い順にデータを１０件分取得
        // 4：PHP
        $items8 = Score::where('language_id', 4)
            ->where('level_id', 2)
            ->orderBy('score', 'desc')
            ->take(10)
            ->get();
        $scoresPHP2 = [
            'items8' => $items8,
        ];

        // pythonで難易度１(ゆっくりコース)スコアが高い順にデータを１０件分取得
        // 5：python
        $items9 = Score::where('language_id', 5)
            ->where('level_id', 1)
            ->orderBy('score', 'desc')
            ->take(10)
            ->get();
        $scoresPython = [
            'items9' => $items9,
        ];
        // pythonで難易度２(ダッシュコース)スコアが高い順にデータを１０件分取得
        // 5：python
        $items10 = Score::where('language_id', 5)
            ->where('level_id', 2)
            ->orderBy('score', 'desc')
            ->take(10)
            ->get();
        $scoresPython2 = [
            'items10' => $items10,
        ];

        // よく使う英単語で難易度１(ゆっくりコース)スコアが高い順にデータを１０件分取得
        // 6：よく使う英単語
        $items11 = Score::where('language_id', 6)
            ->where('level_id', 1)
            ->orderBy('score', 'desc')
            ->take(10)
            ->get();
        $scoresEnglish = [
            'items11' => $items11,
        ];
        // よく使う英単語で難易度２(ダッシュコース)スコアが高い順にデータを１０件分取得
        // 6：よく使う英単語
        $items12 = Score::where('language_id', 6)
            ->where('level_id', 2)
            ->orderBy('score', 'desc')
            ->take(10)
            ->get();
        $scoresEnglish2 = [
            'items12' => $items12,
        ];


        $data = [
            'scoresHTML' => $scoresHTML,
            'scoresHTML2' => $scoresHTML2,
            'scoresCSS' => $scoresCSS,
            'scoresCSS2' => $scoresCSS2,
            'scoresJS' => $scoresJS,
            'scoresJS2' => $scoresJS2,
            'scoresPHP' => $scoresPHP,
            'scoresPHP2' => $scoresPHP2,
            'scoresPython' => $scoresPython,
            'scoresPython2' => $scoresPython2,
            'scoresEnglish' => $scoresEnglish,
            'scoresEnglish2' => $scoresEnglish2,
        ];

        return view('fronts.scores_ranking', $data);
    }
}
