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
            ->orderBy('Score', 'desc')
            ->get();


        $data = [
            'level_id' => '',
            'items' => $items,
        ];


        return view('fronts.scores_ranking', $data);
    }
}
