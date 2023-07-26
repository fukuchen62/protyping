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

        // モデルからデータを取得
        $items = Score::where('is_show', 1)
            // ->where('level_id', 1)
            ->orderBy('Score', 'desc')
            ->get();


        $languages = [1, 2, 3]; // コースIDに合わせて適切な値に変更してください
        $itemsByCourse = [];

        foreach ($languages as $language) {
            $itemsByCourse[$language] = Score::where('is_show', 1)
                ->where('language_id', $language)
                ->orderBy('score', 'desc')
                ->take(10)
                ->get();
        }


        // $items2 = Score::where('is_show', 1)
        //     ->where('level_id', 1)
        //     ->orderBy('Score', 'desc')
        //     ->take(10)
        //     ->get();
        // $items3 = Score::where('is_show', 1)
        //     ->where('level_id', 2)
        //     ->orderBy('Score', 'desc')
        //     ->take(10)
        //     ->get();



        $data = [
            'level_id' => '',
            'items' => $items,
            'itemsByCourse' => $itemsByCourse,
            'languages' => $languages,

            // 'items2' => $items2,
            // 'items3' => $items3,
        ];



        return view('fronts.scores_ranking', $data);
    }
}
