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
        $items = News::all();
        $news = [
            'items' => $items,
        ];

        // 知っトク情報を取得
        $items2 = Knowhow::all();
        $knowhows = [
            'items2' => $items2,
        ];

        // 難易度別に各言語のランキングTOP3のデータを取得
        $items3 = Score::all();
        $scores = [
            'items3' => $items3,
        ];

        $data = [
            'news' => $news,
            'knowhows' => $knowhows,
            'scores' => $scores,
        ];

        // viewの引数っていくつでも増やせる
        //return view('main.index', $data1,$data2…);
        return view('fronts.index', $data);
    }
}
