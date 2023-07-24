<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

        return view('fronts.scores_ranking');
    }
}
