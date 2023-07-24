<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyscoreController extends Controller
{
    /**
     * getmyscore function
     * コース(難易度)別に各言語カテゴリーのハイスコアを表示させる
     * @param Request $request
     * @return void
     */
    public function getmyscore(Request $request)
    {
        // コース(難易度)別に各言語カテゴリーのハイスコアを表示させる(デフォルトはのんびりコース)

        return view('fronts.myscore');
    }
}
